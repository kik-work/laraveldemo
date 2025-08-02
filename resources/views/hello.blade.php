<!DOCTYPE html>
<html>

<head>
    <title>Hello Page</title>
</head>

<body>
    <h1>Hello, world from KIK!</h1>

    <a href="{{ url('/') }}">Go Back</a>

    <button id="loadmsg">Load Message</button>
    <button id="closemsg">Close Message</button>

    <div id="msgContent" style="margin-top: 20px;"></div>

    <script>
        const msgContent = document.getElementById('msgContent');

        document.getElementById('loadmsg').addEventListener('click', function() {
            fetch('/msg')
                .then(response => response.text())
                .then(data => {
                    msgContent.innerHTML = data;
                    msgContent.style.display = 'block'; // Show again if hidden
                })
                .catch(error => {
                    console.error('Error loading message:', error);
                });
        });

        document.getElementById('closemsg').addEventListener('click', function() {
            msgContent.style.display = 'none'; // Just hide the content
        });
    </script>
</body>

</html>
