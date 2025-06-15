const toggleBtn = document.getElementById('chat-toggle');
const chatBox = document.getElementById('chat-box');
const input = document.getElementById('chat-input');
const messages = document.getElementById('chat-messages');

toggleBtn.addEventListener('click', () => {
    chatBox.classList.toggle('hidden');
});

input.addEventListener('keypress', async (e) => {
    if (e.key === 'Enter' && input.value.trim() !== '') {
        const userMsg = input.value;
        addMessage('Vous', userMsg);
        input.value = '';

        try {
            const res = await fetch('http://localhost:3001/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: userMsg })
            });

            const data = await res.json();
            addMessage('Archéo-it', data.reply);
        } catch (err) {
            addMessage('Erreur', "Impossible de contacter l'assistant.");
        }
    }
});

function addMessage(author, text) {
    const msg = document.createElement('div');
    msg.innerHTML = `<strong>${author} :</strong> ${text}`;
    messages.appendChild(msg);
    messages.scrollTop = messages.scrollHeight;
}