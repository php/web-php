import phpBinary from "/js/php-web.mjs";

function generateExampleOutputTitle(phpVersion) {
  return "Output of the above example in PHP "+ phpVersion +":";
}

function createOutput(output) {
  const container = document.createElement("div");
  container.classList.add("screen", "example-contents");
  const title = document.createElement("p");
  title.innerText = generateExampleOutputTitle(PHP.version);
  container.appendChild(title);
  const div = document.createElement("div");
  div.classList.add("examplescode");
  container.appendChild(div);
  const pre = document.createElement("pre");
  pre.classList.add("examplescode");
  pre.innerText = output;
  div.appendChild(pre);
  return container;
}

class PHP {
  static buffer = [];
  static runPhp = null;
  static version = '';
  static async loadPhp() {
    if (PHP.runPhp) {
      return PHP.runPhp;
    }

    const { ccall } = await phpBinary({
      print(data) {
        if (!data) {
          return;
        }

        if (PHP.buffer.length) {
          PHP.buffer.push("\n");
        }
        PHP.buffer.push(data);
      },
    });

    PHP.version = ccall("phpw_exec", "string", ["string"], ["phpversion();"]),
    console.log("PHP wasm %s loaded.", PHP.version);
    PHP.runPhp = (code) => ccall("phpw_run", null, ["string"], ["?>" + code]);
    return PHP.runPhp;
  }
}

async function main() {
  let lastOutput = null;

  document.querySelectorAll(".example .example-contents").forEach((example) => {
    const button = document.createElement("button");
    button.setAttribute("type", "button");
    const phpcode = example.querySelector(".phpcode");
    if (phpcode === null) {
      return;
    }

    const exampleTitleContainer = example.nextElementSibling;
    let exampleTitleParagraphElement = null;
    let exampleScreenPreElement = null;
    if (exampleTitleContainer !== null) {
      exampleTitleParagraphElement = exampleTitleContainer.querySelector("p")
      const exampleScreenContainer = exampleTitleContainer.nextElementSibling;
      exampleScreenPreElement = exampleScreenContainer.querySelector("pre");
    }

    const code = phpcode.querySelector("code");
    code.spellcheck = false;
    code.setAttribute("contentEditable", true);

    button.innerText = "Run code";
    button.onclick = async function () {
      if (lastOutput && lastOutput.parentNode) {
        lastOutput.remove();
      }

      const runPhp = await PHP.loadPhp();
      runPhp(phpcode.innerText);
      if (exampleScreenPreElement !== null) {
        exampleTitleParagraphElement.innerText = generateExampleOutputTitle(PHP.version);
        exampleScreenPreElement.innerText = PHP.buffer.join("");
      } else {
        lastOutput = createOutput(PHP.buffer.join(""));
        phpcode.parentNode.appendChild(lastOutput);
      }
      PHP.buffer.length = 0;
    };

    phpcode.before(button);
  });
}

main();
