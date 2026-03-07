function pesanAwal(){
    showHome();
}

function shout(){
    alert("Hai, Selamat datang di Sistem Sederhana");
}

function showHome(){
    document.getElementById("home").style.display="block";
    document.getElementById("menuMakanan").style.display="none";
    document.getElementById("calculator").style.display="none";
}

function showMenu(){
    alert("Input jumlah pesanan agar dihitung otomatis oleh sistem");
    document.getElementById("home").style.display="none";
    document.getElementById("menuMakanan").style.display="block";
    document.getElementById("calculator").style.display="none";
}

function showCalculator(){
    document.getElementById("home").style.display="none";
    document.getElementById("menuMakanan").style.display="none";
    document.getElementById("calculator").style.display="block";
}

function hitungMenu(){
    let bakso = Number(document.getElementById("bakso").value) * 12000;
    let soto = Number(document.getElementById("soto").value) * 10000;
    let mie = Number(document.getElementById("mie").value) * 15000;
    let total = bakso + soto + mie;
        document.getElementById("total").value = total;
    let diskon = 0;
        if(total > 50000){
            diskon = total * 0.1;
                document.getElementById("diskon").value = diskon;
            let bayar = total - diskon;
                document.getElementById("bayar").value = bayar;
            }
        }

function resetMenu() {
    document.getElementById("bakso").value = 0;
    document.getElementById("soto").value = 0;
    document.getElementById("mie").value = 0;

    document.getElementById("total").value = "";
    document.getElementById("diskon").value = "";
    document.getElementById("bayar").value = "";
}

function hitungCalc(){
    let a = document.getElementById("angka1").value;
    let b = document.getElementById("angka2").value;
    let op = document.getElementById("operator").value;

    if(a=="" || b==""){
        alert("inputan pertama dan kedua harus lebih dari 0");
    return;
}

a = parseFloat(a);
b = parseFloat(b);

let hasil = 0;
    if(op=="+") hasil = a+b;
    else if(op=="-") hasil = a-b;
    else if(op=="*") hasil = a*b;
    else if(op=="/") hasil = a/b;
    else if(op=="%") hasil = a%b;
    else if(op=="^") hasil = Math.pow(a,b);

        document.getElementById("hasil").value = hasil;
    }

    function resetCalc(){
        document.getElementById("angka1").value = "";
        document.getElementById("angka2").value = "";
        document.getElementById("hasil").value = "";
    }
