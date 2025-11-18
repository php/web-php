document.addEventListener('DOMContentLoaded', () => {
    function highlightCode(element) {
        const codeElement = element.querySelector('code') || element;
        const code = codeElement.textContent;
        const escapeHtml = str => str.replace(/[<>&"]/g, c => ({
            '<': '&lt;',
            '>': '&gt;',
            '&': '&amp;',
            '"': '&quot;'
        })[c]);

        const KEYWORDS = new Set(['abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor', 'yield']);
        const LITERALS = new Set(['false', 'true', 'null']);
        const TYPES = new Set(['bool', 'boolean', 'int', 'integer', 'float', 'double', 'string', 'array', 'object', 'resource', 'mixed', 'void', 'iterable', 'self', 'parent', 'static']);
        const OPERATORS_3 = ['==='];
        const OPERATORS_2 = ['==', '!=', '<=', '>=', '=>', '++', '--', '&&', '||', '<<', '>>', '->'];
        const OPERATORS_1 = '=+-*/%<>!&|^~?:';

        function tokenize(text) {
            const tokens = [];
            let i = 0;

            while (i < text.length) {
                const char = text[i];
                const nextChar = text[i + 1];

                if ((char === '/' && nextChar === '/') || char === '#') {
                    const j = text.indexOf('\n', i) >= 0 ? text.indexOf('\n', i) : text.length;
                    tokens.push({type: 'comment', value: text.slice(i, j)});
                    i = j;
                    continue;
                }

                if (char === '"' || char === "'") {
                    let j = i + 1;
                    while (j < text.length && !(text[j] === char && text[j - 1] !== '\\')) j++;
                    tokens.push({type: 'string', value: text.slice(i, j + 1)});
                    i = j + 1;
                    continue;
                }

                if (char === '$') {
                    const match = text.slice(i).match(/^\$[a-zA-Z0-9_]*/);
                    if (match) {
                        tokens.push({type: 'variable', value: match[0]});
                        i += match[0].length;
                        continue;
                    }
                }

                if (/\d/.test(char)) {
                    const match = text.slice(i).match(/^[0-9a-fA-Fbx.]+/);
                    if (match) {
                        tokens.push({type: 'number', value: match[0]});
                        i += match[0].length;
                        continue;
                    }
                }

                if (/[a-zA-Z_]/.test(char)) {
                    const match = text.slice(i).match(/^[a-zA-Z0-9_\\]*/);
                    const word = match[0];
                    const lower = word.toLowerCase();
                    const isConstant = /^[A-Z_][A-Z0-9_]*$/.test(word) && word.length > 1;

                    let type = 'text';
                    if (KEYWORDS.has(lower)) type = 'keyword';
                    else if (LITERALS.has(lower)) type = 'literal';
                    else if (TYPES.has(lower)) type = 'type';
                    else if (isConstant) type = 'constant';
                    else if (word.includes('\\')) type = 'class';
                    else if (/\w\s*\(/.test(text.slice(i))) type = 'function';

                    tokens.push({type, value: word});
                    i += word.length;
                    continue;
                }

                const threeChar = text.slice(i, i + 3);
                if (OPERATORS_3.includes(threeChar)) {
                    tokens.push({type: 'operator', value: threeChar});
                    i += 3;
                    continue;
                }

                const twoChar = text.slice(i, i + 2);
                if (OPERATORS_2.includes(twoChar)) {
                    tokens.push({type: 'operator', value: twoChar});
                    i += 2;
                    continue;
                }

                if (OPERATORS_1.includes(char)) {
                    tokens.push({type: 'operator', value: char});
                    i++;
                    continue;
                }

                if (/\s/.test(char)) {
                    const match = text.slice(i).match(/^\s+/);
                    tokens.push({type: 'space', value: match[0]});
                    i += match[0].length;
                    continue;
                }

                if (';,()[]{}. '.includes(char)) {
                    tokens.push({type: 'punctuation', value: char});
                    i++;
                    continue;
                }

                tokens.push({type: 'text', value: char});
                i++;
            }

            return tokens;
        }

        const spanMap = {
            comment: 'comment',
            string: 'string',
            keyword: 'keyword',
            literal: 'literal',
            type: 'type',
            variable: 'variable',
            number: 'number',
            function: 'function',
            operator: 'operator',
            punctuation: 'punctuation',
            property: 'property',
            class: 'class',
            constant: 'constant'
        };

        codeElement.innerHTML = tokenize(code).map(token => {
            const escaped = escapeHtml(token.value);
            return spanMap[token.type] ? `<span class="${spanMap[token.type]}">${escaped}</span>` : escaped;
        }).join('');
    }

    document.addEventListener('click', async (e) => {
        const btn = e.target.closest('.js-copy-code');
        if (!btn?.closest('.code-container')) return;

        const code = btn.closest('.code-container').querySelector('code').textContent;
        if (!navigator.clipboard) return console.error('Clipboard API not available');

        try {
            await navigator.clipboard.writeText(code);
            const originalHTML = btn.innerHTML;
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M5 14L8.5 17.5L19 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
            btn.disabled = true;
            await new Promise(r => setTimeout(r, 2000));
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        } catch (err) {
            console.error('Copy failed:', err);
        }
    });

    document.querySelectorAll('.js-code').forEach(highlightCode);
});
