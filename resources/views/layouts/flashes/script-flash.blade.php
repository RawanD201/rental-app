<script>
    let flashMessage = document.querySelector('.flash-message');
    flashMessage?.classList.add('hide-message');
    setTimeout(() => {
        flashMessage?.remove();
    }, 5000);
</script>