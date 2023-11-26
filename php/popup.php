<?php
function criarPopup($msg1, $msg2) {
    return
    "
        <style>
        .popup {
            display: block;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* 50% de opacidade */
            z-index: 1;
        }

        .popup-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 5px solid #2c0d49;
            border-radius: 2rem;
            padding: 25px;
            background-color: #f8f8f8;
            align-items: center;
            justify-content: center;
        }
        
        .popup-content button {
            width: 270px;
            height: 55px;
            border-radius: 50px;
            border-style: none;
            background: #2c0d49;
            color: #ffffff;
            font-size: 1.2rem;
            margin: 10px;
            margin-top: 25px;
        }

        .popup-content button:hover {
            cursor: pointer;
        }
        </style>

        <div class='popup' id='popup'>
            <div class='popup-content'>
                <h1>".$msg1."</h1>
                <h3>".$msg2."</h3>
                <button onclick='closePopup()'>Ok</button>
            </div>
        </div>
        <script>
            // Pegando id da tag
            function closePopup () {
                const popup = document.getElementById('popup');
                popup.style.display = 'none';
            }
        </script>
    ";
}
?>