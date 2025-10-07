import phpBinary from "/js/php-web.mjs";

function generateExampleOutputTitle(phpVersion) {
  return "Output of the above example in PHP "+ phpVersion +":";
}

function createOutput(output) {
  const container = document.createElement("div");
  container.classList.add("screen", "example-contents");

  if (output != "") {
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

  const title = document.createElement("p");
  title.innerText = "This example did not produce any output."
  container.appendChild(title);
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
    let initializing = true;

    const { ccall } = await phpBinary({
      print(data) {
        // The initial exec to get PHP version causes empty output we don't want
        if (initializing) {
          return;
        }
        PHP.buffer.push(data + "\n");
      },
    });

    PHP.version = ccall("phpw_exec", "string", ["string"], ["phpversion();"]),
    console.log("PHP wasm %s loaded.", PHP.version);
    initializing = false;
    PHP.runPhp = (code) => ccall("phpw_run", null, ["string"], ["?>" + code]);
    return PHP.runPhp;
  }
}

async function main() {
  let lastOutput = null;

  document.querySelectorAll(".example .example-contents, .informalexample .example-contents").forEach((example) => {
    const button = document.createElement("button");
    button.setAttribute("type", "button");
    const phpcode = example.querySelector(".phpcode.annotation-interactive");
    if (phpcode === null) {
      return;
    }

    const exampleTitleContainer = example.nextElementSibling;
    let exampleTitleParagraphElement = null;
    let exampleScreenPreElement = null;
    if (exampleTitleContainer !== null) {
      if (exampleTitleContainer.tagName === "P") {
        exampleTitleParagraphElement = exampleTitleContainer;
      } else {
        exampleTitleParagraphElement = exampleTitleContainer.querySelector("p")
      }
      const exampleScreenContainer = exampleTitleContainer.nextElementSibling;
      if (exampleScreenContainer !== null) {
        exampleScreenPreElement = exampleScreenContainer.querySelector("pre");
      }
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

    phpcode.after(button);
  });
}

main();
