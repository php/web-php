import phpBinary from "/js/php-web.mjs";

function createOutput(output) {
  const container = document.createElement('div');
  container.classList.add('screen', 'example-contents');
  const title = document.createElement('p');
  title.innerText = 'Output: ';
  container.appendChild(title)
  const div = document.createElement('div');
  div.classList.add('examplescode');
  container.appendChild(div);
  const pre = document.createElement('pre');
  pre.classList.add('examplescode');
  pre.innerText = output;
  div.appendChild(pre)
  return container;
}

async function main() {
  const buffer = [];
  const { ccall } = await phpBinary({
    print(data) {
      if (!data) {
        return;
      }

      if (buffer.length) {
        buffer.push('\n');
      }
      buffer.push(data);
    }
  })

  console.log("PHP wasm %s loaded.", ccall("phpw_exec", "string", ["string"], ["phpversion();"]));
  let lastOutput = null

  document.querySelectorAll('.example').forEach((example) => {
    const button = document.createElement('button');
    button.setAttribute('type', 'button')
    const phpcode = example.querySelector('.phpcode');

    const code = phpcode.querySelector('pre code')
    code.setAttribute('contentEditable', true)

    button.innerText = 'Run code';
    button.onclick = function() {
      if (lastOutput && lastOutput.parentNode) {
        lastOutput.remove()
      }

      ccall("phpw_run", null, ["string"], ['?>' + phpcode.innerText]);
      lastOutput = createOutput(buffer.join(''))
      phpcode.parentNode.appendChild(lastOutput);
      buffer.length = 0;
    };

    phpcode.before(button);
  });

}

main()
