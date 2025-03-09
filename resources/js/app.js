import "./bootstrap";

import "flowbite";
import Alpine from "alpinejs";
import Editor from "@toast-ui/editor";
import "@toast-ui/editor/dist/toastui-editor.css";

// ALPINEJS
window.Alpine = Alpine;
Alpine.start();

// TOAS UI EDITOR MARKDOWN
const editor = new Editor({
  el: document.querySelector("#editor"),
  height: "350px",
  previewStyle: "vertical",
  initialEditType: "markdown",
});

if (document.querySelector("#create-editor")) {
  document.querySelector("#create-editor").addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector("#content").value = editor.getMarkdown();
    e.target.submit();
  });
}

if (document.querySelector("#edit-editor")) {
  editor.setMarkdown(document.querySelector("#old-editor").value);
  document.querySelector("#edit-editor").addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector("#content").value = editor.getMarkdown();
    e.target.submit();
  });
}
