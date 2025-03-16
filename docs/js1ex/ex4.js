document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form");
    const textInput = document.getElementById("text");
    const textList = document.getElementById("text-list");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const textValue = textInput.value;

        const newItem = document.createElement("li");
        newItem.textContent = textValue;

        textList.appendChild(newItem);

        textInput.value = "";
    });
});