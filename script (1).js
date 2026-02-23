document.addEventListener("DOMContentLoaded", () => {
  // Simple hero slider
  const slides = document.querySelectorAll(".slide");
  let i = 0;
  function rotate() {
    slides.forEach(s => s.classList.remove("active"));
    slides[i].classList.add("active");
    i = (i + 1) % slides.length;
  }
  if (slides.length) {
    rotate();
    setInterval(rotate, 2500);
  }

  // Chatbot (on homepage index.php)
  const chatInput = document.getElementById("chat-text");
  const chatSend = document.getElementById("chat-send");
  const chatLog = document.getElementById("chat-log");

  function botSay(text) {
    if (!chatLog) return;
    const div = document.createElement("div");
    div.className = "bot";
    div.textContent = text;
    chatLog.appendChild(div);
    chatLog.scrollTop = chatLog.scrollHeight;
  }
  function userSay(text) {
    if (!chatLog) return;
    const div = document.createElement("div");
    div.className = "user";
    div.textContent = text;
    chatLog.appendChild(div);
    chatLog.scrollTop = chatLog.scrollHeight;
  }
  function answer(q) {
    q = q.toLowerCase();
    if (q.includes("cotton")) return "Cotton is breathable—great for summer wearables and baby items.";
    if (q.includes("wool")) return "Wool is warm and elastic—perfect for winter garments.";
    if (q.includes("merino")) return "Merino is extra soft with lovely stitch definition.";
    if (q.includes("acrylic")) return "Acrylic is budget-friendly and easy-care—nice for amigurumi.";
    if (q.includes("bamboo")) return "Bamboo blends are cool with drape—ideal for shawls.";
    if (q.includes("dk") || q.includes("worsted") || q.includes("sport")) return "Weight guide: Sport ≈ fine, DK ≈ light, Worsted ≈ medium.";
    if (q.includes("hook") || q.includes("needle")) return "Hooks: Sport 3–3.5mm, DK 4mm, Worsted 5mm (adjust for tension).";
    return "Ask about fibers, weights, care tips, or hook sizes. Vanakkam!";
  }

  if (chatSend && chatInput) {
    botSay("Vanakkam! Ask me about yarns, weights, or care tips.");
    chatSend.addEventListener("click", () => {
      const text = chatInput.value.trim();
      if (!text) return;
      userSay(text);
      botSay(answer(text));
      chatInput.value = "";
    });
    chatInput.addEventListener("keydown", (e) => {
      if (e.key === "Enter") chatSend.click();
    });
  }
});
