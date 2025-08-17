// Modern PHP Homepage Interactions
document.addEventListener('DOMContentLoaded', function() {
    // Code demo switcher
    const codeButtons = document.querySelectorAll('.code-btn');
    const codeDemos = document.querySelectorAll('.code-demo');

    codeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetDemo = this.getAttribute('data-demo');

            // Remove active class from all buttons and demos
            codeButtons.forEach(btn => btn.classList.remove('active'));
            codeDemos.forEach(demo => demo.classList.remove('active'));

            // Add active class to clicked button and corresponding demo
            this.classList.add('active');
            document.getElementById(targetDemo + '-demo').classList.add('active');
        });
    });
});
