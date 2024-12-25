<div id="alert-message" class="alert-container">
    @if ($status == 'success')
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @elseif ($status == 'error')
        <div class="alert alert-error">
            {{ $message }}
        </div>
    @endif
</div>

<script>
    // Set a timeout to remove the alert after 3 seconds
    setTimeout(function() {
        var alertMessage = document.getElementById('alert-message');
        if (alertMessage) {
            alertMessage.style.display = 'none'; // Hide the alert
        }
    }, 3000); 
</script>
