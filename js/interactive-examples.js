import phpBinary from "/js/php-web.mjs";

function createOutput(output) {
  const container = document.createElement("div");
  container.classList.add("screen", "example-contents");
  const title = document.createElement("p");
  title.innerText = "Output: ";
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

    console.log(
      "PHP wasm %s loaded.",
      ccall("phpw_exec", "string", ["string"], ["phpversion();"]),
    );
    PHP.runPhp = (code) => ccall("phpw_run", null, ["string"], ["?>" + code]);
    return PHP.runPhp;
  }
}

async function main() {
  let lastOutput = null;

  document.querySelectorAll(".example").forEach((example) => {
    const button = document.createElement("button");
    button.setAttribute("type", "button");
    const phpcode = example.querySelector(".phpcode");

    const code = phpcode.querySelector("code");
    code.setAttribute("contentEditable", true);

    button.innerText = "Run code";
    button.onclick = async function () {
      if (lastOutput && lastOutput.parentNode) {
        lastOutput.remove();
      }

      const runPhp = await PHP.loadPhp();
      runPhp(phpcode.innerText);
      lastOutput = createOutput(PHP.buffer.join(""));
      phpcode.parentNode.appendChild(lastOutput);
      PHP.buffer.length = 0;
    };

    phpcode.before(button);
  });
}

main();
