var vpis1 = window.prompt("Vnesite rdečo barvo RGB modela");
var vpis2 = window.prompt("Vnesite zeleno barvo RGB modela");
var vpis3 = window.prompt("Vnesite modro barvo RGB modela");
var vpis4 = window.prompt("Vnesite število elementov seznama");

var r = parseInt(vpis1);
var g = parseInt(vpis2);
var b = parseInt(vpis3);
var st = parseInt(vpis4);

var minusR = r/(st-1);
var minusG = g/(st-1);
var minusB = b/(st-1);

var okvirBool = false;
var okvirId;

function ifNeg (st,r,g,b) {
    if (isNaN(st) || isNaN(r) || isNaN(g) || isNaN(b)) {
        document.write("<p>isNaN</p>");
        return false;
    } else return true;
}

function klik(index) {
    let pOld = document.getElementById(okvirId);
    let p = document.getElementById(index);
    if (!okvirBool) {
        p.style.border = 'solid red 2px';
        okvirId = index;
        okvirBool = true;
    } else if (index==okvirId) {
        p.style.border = '0px';
        okvirBool = false
    } else if (okvirBool) {
        pOld.style.border = '0px';
        p.style.border = 'solid red 2px';
        okvirId = index;
    }
}

function izpisElem() {
    if (ifNeg(st,r,g,b)) {
        for (let index = 0; index < st; index++) {
            var style = "background-color: rgb("+r+", "+g+", "+b+"); color: rgb("+(255-r)+", "+(255-g)+", "+(255-b)+");";
            document.write("<p id=\""+index+"\" onclick=\"klik("+index+")\" style=\""+style+"\">rgb("+Math.round(r)+", "+Math.round(g)+", "+Math.round(b)+")</p>");
            r -= minusR;
            g -= minusG;
            b -= minusB;
        }
    }
}