function setSelectBoxes() {
    let instructionsDiv = document.getElementById("instructions")
	let osSelector = document.getElementById("os")
	let variantSelector = document.getElementById("osvariant")
	let usageSelector = document.getElementById("usage")
	let versionSelector = document.getElementById("version")
    let multiversionBox = document.getElementById("multiversion")

    const url = '/downloads-get-instructions.php' +
        '?os=' + osSelector.options[osSelector.selectedIndex].value +
        '&osvariant=' + variantSelector.options[variantSelector.selectedIndex].value +
        '&usage=' + usageSelector.options[usageSelector.selectedIndex].value +
        '&version=' + versionSelector.options[versionSelector.selectedIndex].value +
        '&multiversion=' + multiversionBox.checked

    fetch(url)
        .then(response => {
            if (response.ok) {
                return response.text()
            } else {
                throw new Error("Couldn't fetch instructions");
            }
        })
        .then(data => {
            instructionsDiv.innerHTML = data
        })
        .catch(error => console.error("Couldn't fetch instructions: ", error));
}

function setSelectOsBoxes() {
	let osSelector = document.getElementById("os")
	let variantSelector = document.getElementById("osvariant")
	
    for (var i = variantSelector.length - 1; i >= 0; i--) {
		if (!variantSelector.options[i].value.startsWith(osSelector.options[osSelector.selectedIndex].value + "-")) {
			variantSelector.options[i].disabled = true
		} else {
			variantSelector.options[i].disabled = false
			variantSelector.selectedIndex = i
		}
	}

    setSelectBoxes();
}

window.onload = function() {
	let osSelector = document.getElementById("os")
	let variantSelector = document.getElementById("osvariant")
	let usageSelector = document.getElementById("usage")
	let versionSelector = document.getElementById("version")
	let multiversionBox = document.getElementById("multiversion")

	osSelector.addEventListener("change", setSelectOsBoxes)
	variantSelector.addEventListener("change", setSelectBoxes)
	usageSelector.addEventListener("change", setSelectBoxes)
	versionSelector.addEventListener("change", setSelectBoxes)
	multiversionBox.addEventListener("change", setSelectBoxes)

	setSelectOsBoxes()
}
