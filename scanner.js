function startScanner(){

    const course = document.getElementById("course").value;
    const date = document.getElementById("date").value;

    if(course==""){
        alert("Please select a course.");
        return;
    }

    document.getElementById("reader").style.display="block";

    const scanner = new Html5QrcodeScanner(
        "reader",
        {
            fps:10,
            qrbox:250
        }
    );

    scanner.render(function(decodedText){

        document.getElementById("result").innerHTML =
        "✅ QR Detected: " + decodedText;

        scanner.clear();

        fetch(
        "save-scan.php",
        {
            method:"POST",
            headers:{
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body:
            "qr="+encodeURIComponent(decodedText)+
            "&course="+course+
            "&date="+date
        })

        .then(response=>response.text())

        .then(data=>{

    console.log(data);

    alert(data);

    document.getElementById("reader").style.display="none";

    `
    <div style="
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    margin-top:20px;
    text-align:center;
    ">

    <h2 style="color:#2e7d32;">
    ✅ Attendance Recorded
    </h2>

    <p style="font-size:18px;">
    ${data}
    </p>

    <p>
    📅 ${date}
    </p>

    <p>
    🕒 ${new Date().toLocaleTimeString()}
    </p>

    </div>
    `;

});

    });

}