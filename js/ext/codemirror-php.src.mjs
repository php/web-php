/*
 * CodeMirror 6 wiring for the PHP Playground. This is the un-bundled source of
 * codemirror-php.mjs, kept next to it so the bundle stays reproducible; the
 * site itself has no frontend build step, so the bundle is committed.
 *
 * To rebuild:
 *   npm install codemirror@6 @codemirror/view@6 @codemirror/state@6 \
 *     @codemirror/language@6 @codemirror/commands@6 @codemirror/lang-php@6 \
 *     @lezer/highlight@1 esbuild
 *   npx esbuild codemirror-php.src.mjs --bundle --format=esm --minify \
 *     --outfile=codemirror-php.mjs
 *
 * The playground loads the bundle with a dynamic import() and falls back to a
 * plain <textarea> when it is unavailable.
 */
import { EditorView, keymap } from '@codemirror/view';
import { EditorState, Prec } from '@codemirror/state';
import { basicSetup } from 'codemirror';
import { indentUnit, syntaxHighlighting, HighlightStyle } from '@codemirror/language';
import { indentWithTab } from '@codemirror/commands';
import { php } from '@codemirror/lang-php';
import { tags } from '@lezer/highlight';

/* The classic highlight_string() palette, sourced from the CSS custom
 * properties so the editor and the rest of the page stay in step. */
const phpHighlight = HighlightStyle.define([
  {
    tag: [
      tags.keyword,
      tags.controlKeyword,
      tags.operatorKeyword,
      tags.definitionKeyword,
      tags.moduleKeyword,
    ],
    color: 'var(--hl-keyword)',
    fontWeight: '500',
  },
  { tag: [tags.atom, tags.bool], color: 'var(--hl-keyword)' },
  {
    tag: [tags.string, tags.special(tags.string), tags.character, tags.regexp, tags.escape],
    color: 'var(--hl-string)',
  },
  {
    tag: [tags.comment, tags.lineComment, tags.blockComment, tags.docComment],
    color: 'var(--hl-comment)',
    fontStyle: 'italic',
  },
  {
    tag: [
      tags.variableName,
      tags.propertyName,
      tags.definition(tags.variableName),
      tags.function(tags.variableName),
      tags.className,
      tags.typeName,
      tags.namespace,
      tags.number,
    ],
    color: 'var(--hl-default)',
  },
  { tag: [tags.operator, tags.punctuation, tags.bracket], color: 'var(--hl-html)' },
  { tag: [tags.meta, tags.processingInstruction], color: 'var(--php-purple-dark)' },
  { tag: tags.tagName, color: 'var(--hl-default)' },
  { tag: tags.attributeName, color: 'var(--hl-default)' },
  { tag: tags.attributeValue, color: 'var(--hl-string)' },
]);

/* Editor chrome — tuned to the same surfaces the playground panes use. */
const phpTheme = EditorView.theme(
  {
    '&': {
      height: '100%',
      backgroundColor: 'var(--php-content)',
      color: 'var(--hl-html)',
    },
    '.cm-scroller': {
      fontFamily: 'var(--font-family-mono)',
      fontSize: '14px',
      lineHeight: '1.55',
    },
    '.cm-gutters': {
      backgroundColor: 'var(--php-code-bg)',
      color: '#aab',
      border: 'none',
      borderRight: '1px solid var(--php-border)',
    },
    '.cm-activeLine': { backgroundColor: '#f6f7fb' },
    '.cm-activeLineGutter': { backgroundColor: '#eef0f7' },
    '&.cm-focused': { outline: 'none' },
    '&.cm-focused .cm-cursor': { borderLeftColor: 'var(--php-purple-dark)' },
    '.cm-matchingBracket, &.cm-focused .cm-matchingBracket': {
      backgroundColor: 'transparent',
      color: 'var(--php-purple-dark)',
      fontWeight: '600',
    },
  },
  { dark: false },
);

const extensions = [
  basicSetup,
  php(), // PHP embedded in HTML
  Prec.highest(syntaxHighlighting(phpHighlight)), // win over basicSetup's default
  indentUnit.of('    '),
  keymap.of([indentWithTab]),
  phpTheme,
];

// One EditorState per file — each carries its own document and undo history.
export function makeState(text) {
  return EditorState.create({ doc: text, extensions });
}

export function createView(parent) {
  return new EditorView({ state: makeState(''), parent });
}

export { EditorView };
