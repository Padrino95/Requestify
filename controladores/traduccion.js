function translateText() {
  const inputText = document.querySelector("#input").value;
  // Pon tu apiKey entre las comillas
  const apiKey = "";
  const targetLanguage = "es";

  // Detectar automáticamente el idioma de origen
  fetch(
    `https://translation.googleapis.com/language/translate/v2/detect?key=${apiKey}`,
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        q: inputText,
      }),
    }
  )
    .then((response) => response.json())
    .then((data) => {
      const sourceLanguage = data.data.detections[0][0].language;
      // Traducción al español
      fetch(
        `https://translation.googleapis.com/language/translate/v2?key=${apiKey}`,
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            q: inputText,
            source: sourceLanguage,
            target: targetLanguage,
          }),
        }
      )
        .then((response) => response.json())
        .then((data) => {
          const translatedText = data.data.translations[0].translatedText;
          document.getElementById("output").innerText = translatedText;
        })
        .catch((error) => console.error("Error:", error));
    })
    .catch((error) => console.error("Error:", error));
}