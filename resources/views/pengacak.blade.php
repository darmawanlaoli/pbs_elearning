<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengacak Tempat Duduk Siswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 1100px;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .2);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            text-align: center;
            margin-bottom: 25px;
            color: #666;
        }

        button {
            display: block;
            margin: auto;
            padding: 15px 35px;
            font-size: 18px;
            background: #2196F3;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: .3s;
        }

        button:hover {
            background: #1565C0;
            transform: scale(1.05);
        }

        .kelas {
            margin-top: 40px;
        }

        .barisan {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 18px;
        }

        button:disabled {
            background: #888;
            cursor: not-allowed;
        }

        .meja {
            height: 85px;
            background: #FFF9C4;
            border: 3px solid #FBC02D;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 8px;
            font-weight: bold;
            color: #444;
            transition: .3s;
        }

        .meja:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
        }

        @keyframes pop {

            0% {
                transform: scale(.5) rotate(-10deg);
                opacity: 0;
            }

            60% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }

        }

        .meja {
            height: 85px;
            background: #FFF9C4;
            border: 3px solid #FBC02D;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 8px;
            font-weight: bold;
            color: #444;
            transition: .5s;
        }

        .meja.animate {
            transform: scale(1.1);
            background: #A5D6A7;
        }
    </style>

</head>

<body>

    <div class="container">

        <h1>🎓 Pengacak Tempat Duduk Siswa</h1>
        <p>4 Baris × 5 Meja</p>



        <button onclick="acakTempat()">🎲 Acak Tempat Duduk</button>
        <p style="margin-top: 20px">Sampel yang diambil adalah kelas 8, akan dikembangkan agar guru bisa memilih kelas dan layout kelas</p>
        <div class="kelas" id="kelas"></div>

    </div>

    <script>
        const siswa = [
    "Lara","Clarisa","Gisella","Grace","Abel",
    "Hizkia","Jose","Kevan","Kevin","Kimberly",
    "Langit","Makaio","Marsha","Evan","Giffin",
    "Levine","Angel","Nikita","Sammy","Velocita", "Naro"
];

const spinSound = document.getElementById("spinSound");
const finishSound = document.getElementById("finishSound");

let animasi = false;

function tampilkan(data){

    const kelas=document.getElementById("kelas");
    kelas.innerHTML="";

    for(let i=0;i<4;i++){

        let row=document.createElement("div");
        row.className="barisan";

        for(let j=0;j<5;j++){

            let meja=document.createElement("div");
            meja.className="meja";
            meja.innerHTML=data[i*5+j];

            row.appendChild(meja);
        }

        kelas.appendChild(row);
    }

}

function shuffle(arr){

    for(let i=arr.length-1;i>0;i--){

        let j=Math.floor(Math.random()*(i+1));

        [arr[i],arr[j]]=[arr[j],arr[i]];
    }

}

function acakTempat(){

    if(animasi) return;

    animasi=true;

    const btn=document.querySelector("button");
    btn.disabled=true;
    btn.innerHTML="⏳ Mengacak...";

    let interval=setInterval(()=>{

        let sementara=[...siswa];
        shuffle(sementara);
        tampilkan(sementara);

    },100);

    setTimeout(()=>{

        clearInterval(interval);

        spinSound.pause();
        spinSound.currentTime = 0;

        finishSound.currentTime = 0;
        finishSound.play();

        shuffle(siswa);

        tampilkan(siswa);

        document.querySelectorAll(".meja").forEach((meja)=>{

            meja.style.animation="pop .5s ease";

            setTimeout(()=>{
                meja.style.animation="";
            },500);

        });

        btn.disabled=false;
        btn.innerHTML="🎲 Acak Tempat Duduk";

        animasi=false;

    },3000);

}

tampilkan(siswa);
    </script>

    <audio id="spinSound" preload="auto">
        <source src="roulette.wav" type="audio/wav">
    </audio>

    <audio id="finishSound" preload="auto">
        <source src="finish.wav" type="audio/wav">
    </audio>

</body>

</html>
