<?php
if (isset($_SESSION['alert'])) {
    $type = $_SESSION['alert']['type'];
    $message = $_SESSION['alert']['message'];
    unset($_SESSION['alert']);
?>
<div style="z-index: 999;" class="alert alert-<?= htmlspecialchars($type ?? 'info') ?> alert-dismissible fade show mt-5" role="alert">
    <?= htmlspecialchars($message) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) {
        bootstrap.Alert.getOrCreateInstance(alert).close();
    }
}, 3000);
</script>
<?php
}
?> 