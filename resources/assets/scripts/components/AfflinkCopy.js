const TEXT_SELECTOR = '.ldvi-Afflink_TextToCopy'
const COPIED_TEXT = 'Copied!'
export default class {
  constructor(copyElement) {
    copyElement.addEventListener('click', () => {
      main(copyElement)
    })
  }
}

async function main(copyElement) {
  const textElement = await getTextElement()
  copyText(textElement)
  changeText(copyElement, COPIED_TEXT)
}

async function getTextElement() {
  return document.querySelector(TEXT_SELECTOR)
}

async function copyText(element) {
  await navigator.clipboard.writeText(element.textContent);
}

async function changeText(element, text) {
  element.textContent = text
}
