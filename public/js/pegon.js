  // milio48 - cikup.com
  //sumber https://asbab.id/fi/pegon
  function pegonkan(rapegon, rwyt, bol){
    if(rwyt == true){riwayat();}
    if(bol == true && bol != 'rabalik'){bold();}
    if(bol == 'rabalik'){bold('rabalik');}
    var raw = rapegon.trim();

    var DATA = raw;

    var DATA = DATA.replace(/AL/g,  "ال");
    var DATA = DATA.replace(/TS/g,  "ث");
    var DATA = DATA.replace(/KH/g,  "خ");
    var DATA = DATA.replace(/DZ/g,  "ذ");
    var DATA = DATA.replace(/SY/g,  "ش");
    var DATA = DATA.replace(/SH/g,  "ص");
    var DATA = DATA.replace(/DH/g,  "ض");
    var DATA = DATA.replace(/TH/g,  "ط");
    var DATA = DATA.replace(/ZH/g,  "ظ");
    var DATA = DATA.replace(/GH/g,  "غ");
    var DATA = DATA.replace(/H/g,  "ح");
    var DATA = DATA.replace(/E/g,  "ع");
    var DATA = DATA.replace(/A/g,  "ا");

    var DATA = DATA.replace(/M/g,  "أ");
    var DATA = DATA.replace(/W/g,  "إ");
    var DATA = DATA.replace(/O/g,  "ء");
    var DATA = DATA.replace(/U/g,  "ؤ");
    var DATA = DATA.replace(/I/g,  "ئ");
    var DATA = DATA.replace(/T/g,  "ة");
    var DATA = DATA.replace(/Y/g,  "ى");

    var data = DATA.toLowerCase();

        var data = data.replace(/^ia/g,  "إييا");
        var data = data.replace(/^ua/,  "أووا");

        var data = data.replace(/ ia/g,  " إييا");
        var data = data.replace(/ia/g,  "ييا");
        var data = data.replace(/ua/g,  "ووا");

        var data = data.replace(/nga/g,  "ڠا");
        var data = data.replace(/ngi/g,  "ڠي");
        var data = data.replace(/ngu/g,  "ڠو");
        var data = data.replace(/nge~/g, "ڠٓ");
        var data = data.replace(/nge/g,  "ڠي");
        var data = data.replace(/ngo/g,  "ڠو");

        var data = data.replace(/nya/g,  "پا");
        var data = data.replace(/nyi/g,  "پي");
        var data = data.replace(/nyu/g,  "پو");
        var data = data.replace(/nye~/g, "پٓ");
        var data = data.replace(/nye/g,  "پي");
        var data = data.replace(/nyo/g,  "پو");

        var data = data.replace(/ng/g,  "ڠ");
        var data = data.replace(/ny/g,  "پ");

        var data = data.replace(/ba/g,  "با");
        var data = data.replace(/bi/g,  "بي");
        var data = data.replace(/bu/g,  "بو");
        var data = data.replace(/be~/g, "بٓ");
        var data = data.replace(/be/g,  "بي");
        var data = data.replace(/bo/g,  "بو");

        var data = data.replace(/ca/g,  "چا");
        var data = data.replace(/ci/g,  "چي");
        var data = data.replace(/cu/g,  "چو");
        var data = data.replace(/ce~/g, "جٓ");
        var data = data.replace(/ce/g,  "چي");
        var data = data.replace(/co/g,  "چو");

        var data = data.replace(/da/g,  "دا");
        var data = data.replace(/di/g,  "دي");
        var data = data.replace(/du/g,  "دو");
        var data = data.replace(/de~/g, "دٓ");
        var data = data.replace(/de/g,  "دي");
        var data = data.replace(/do/g,  "دو");

        var data = data.replace(/fa/g,  "فا");
        var data = data.replace(/fi/g,  "في");
        var data = data.replace(/fu/g,  "فو");
        var data = data.replace(/fe~/g, "فٓ");
        var data = data.replace(/fe/g,  "في");
        var data = data.replace(/fo/g,  "فو");

        var data = data.replace(/ga/g,  "ڮا");
        var data = data.replace(/gi/g,  "ڮي");
        var data = data.replace(/gu/g,  "ڮو");
        var data = data.replace(/ge~/g, "ڮٓ");
        var data = data.replace(/ge/g,  "ڮي");
        var data = data.replace(/go/g,  "ڮو");

        var data = data.replace(/ha/g,  "ها");
        var data = data.replace(/hi/g,  "هي");
        var data = data.replace(/hu/g,  "هو");
        var data = data.replace(/he~/g, "ه‍ٓ");
        var data = data.replace(/he/g,  "هي");
        var data = data.replace(/ho/g,  "هو");

        var data = data.replace(/ja/g,  "جا");
        var data = data.replace(/ji/g,  "جي");
        var data = data.replace(/ju/g,  "جو");
        var data = data.replace(/je~/g, "جٓ");
        var data = data.replace(/je/g,  "جي");
        var data = data.replace(/jo/g,  "جو");

        var data = data.replace(/ka/g,  "كا");
        var data = data.replace(/ki/g,  "كي");
        var data = data.replace(/ku/g,  "كو");
        var data = data.replace(/ke~/g, "كٓ");
        var data = data.replace(/ke/g,  "كي");
        var data = data.replace(/ko/g,  "كو");

        var data = data.replace(/la/g,  "لا");
        var data = data.replace(/li/g,  "لي");
        var data = data.replace(/lu/g,  "لو");
        var data = data.replace(/le~/g, "لٓ");
        var data = data.replace(/le/g,  "لي");
        var data = data.replace(/lo/g,  "لو");

        var data = data.replace(/ma/g,  "ما");
        var data = data.replace(/mi/g,  "مي");
        var data = data.replace(/mu/g,  "مو");
        var data = data.replace(/me~/g, "مٓ");
        var data = data.replace(/me/g,  "مي");
        var data = data.replace(/mo/g,  "مو");

        var data = data.replace(/na/g,  "نا");
        var data = data.replace(/ni/g,  "ني");
        var data = data.replace(/nu/g,  "نو");
        var data = data.replace(/ne~/g, "نٓ");
        var data = data.replace(/ne/g,  "ني");
        var data = data.replace(/no/g,  "نو");

        var data = data.replace(/pa/g,  "ڤا");
        var data = data.replace(/pi/g,  "ڤي");
        var data = data.replace(/pu/g,  "ڤو");
        var data = data.replace(/pe~/g, "ڤٓ");
        var data = data.replace(/pe/g,  "ڤي");
        var data = data.replace(/po/g,  "ڤو");

        var data = data.replace(/qa/g,  "قا");
        var data = data.replace(/qi/g,  "قي");
        var data = data.replace(/qu/g,  "قو");
        var data = data.replace(/qe~/g, "قٓ");
        var data = data.replace(/qe/g,  "قي");
        var data = data.replace(/qo/g,  "قو");

        var data = data.replace(/ra/g,  "را");
        var data = data.replace(/ri/g,  "ري");
        var data = data.replace(/ru/g,  "رو");
        var data = data.replace(/re~/g, "رٓ");
        var data = data.replace(/re/g,  "ري");
        var data = data.replace(/ro/g,  "رو");

        var data = data.replace(/sa/g,  "سا");
        var data = data.replace(/si/g,  "سي");
        var data = data.replace(/su/g,  "سو");
        var data = data.replace(/se~/g, "سٓ");
        var data = data.replace(/se/g,  "سي");
        var data = data.replace(/so/g,  "سو");

        var data = data.replace(/ta/g,  "تا");
        var data = data.replace(/ti/g,  "تي");
        var data = data.replace(/tu/g,  "تو");
        var data = data.replace(/te~/g, "تٓ");
        var data = data.replace(/te/g,  "تي");
        var data = data.replace(/to/g,  "تو");

        var data = data.replace(/va/g,  "فا");
        var data = data.replace(/vi/g,  "في");
        var data = data.replace(/vu/g,  "فو");
        var data = data.replace(/ve~/g, "فٓ");
        var data = data.replace(/ve/g,  "في");
        var data = data.replace(/vo/g,  "فو");

        var data = data.replace(/wa/g,  "وا");
        var data = data.replace(/wi/g,  "وي");
        var data = data.replace(/wu/g,  "وو");
        var data = data.replace(/we~/g, "وٓ");
        var data = data.replace(/we/g,  "وي");
        var data = data.replace(/wo/g,  "وو");

        var data = data.replace(/ya/g,  "يا");
        var data = data.replace(/yi/g,  "يي");
        var data = data.replace(/yu/g,  "يو");
        var data = data.replace(/ye~/g, "يٓ");
        var data = data.replace(/ye/g,  "يي");
        var data = data.replace(/yo/g,  "يو");

        var data = data.replace(/za/g,  "زا");
        var data = data.replace(/zi/g,  "زي");
        var data = data.replace(/zu/g,  "زو");
        var data = data.replace(/ze~/g, "زٓ");
        var data = data.replace(/ze/g,  "زي");
        var data = data.replace(/zo/g,  "زو");

        var data = data.replace(/xa/g,  "كا");
        var data = data.replace(/xi/g,  "كي");
        var data = data.replace(/xu/g,  "كو");
        var data = data.replace(/xe~/g, "كٓ");
        var data = data.replace(/xe/g,  "كي");
        var data = data.replace(/xo/g,  "كو");

        var data = data.replace(/b/g,  "ب");
        var data = data.replace(/c/g,  "چ");
        var data = data.replace(/d/g,  "د");
        var data = data.replace(/f/g,  "ف");
        var data = data.replace(/g/g,  "ڮ");
        var data = data.replace(/h/g,  "ه");
        var data = data.replace(/j/g,  "ج");
        var data = data.replace(/k/g,  "ك");
        var data = data.replace(/l/g,  "ل");
        var data = data.replace(/m/g,  "م");
        var data = data.replace(/n/g,  "ن");
        var data = data.replace(/p/g,  "ڤ");
        var data = data.replace(/q/g,  "ق");
        var data = data.replace(/r/g,  "ر");
        var data = data.replace(/s/g,  "س");
        var data = data.replace(/t/g,  "ت");
        var data = data.replace(/v/g,  "ف");
        var data = data.replace(/w/g,  "و");
        var data = data.replace(/x/g,  "ك");
        var data = data.replace(/y/g,  "ي");
        var data = data.replace(/z/g,  "ز");
        
        var data = data.replace(/a/g,  "أ");
        var data = data.replace(/i/g,  "إي");
        var data = data.replace(/u/g,  "أو");
        var data = data.replace(/e~/g, "أٓ");
        var data = data.replace(/e/g,  "أي");
        var data = data.replace(/o/g,  "أو");

        var data = data.replace(/1/g,  "١");
        var data = data.replace(/2/g,  "٢");
        var data = data.replace(/3/g,  "٣");
        var data = data.replace(/4/g, "٤");
        var data = data.replace(/5/g,  "٥");
        var data = data.replace(/6/g,  "٦");
        var data = data.replace(/7/g,  "٧");
        var data = data.replace(/8/g,  "٨");
        var data = data.replace(/9/g,  "٩");
        var data = data.replace(/0/g, "٠");


    var data = data.replace(/\077/g,  "؟");
    var data = data.replace(/,/g,  "،");
    var data = data.replace(/\./g,  ".");
    var data = data.replace(/\~/g,  "ٓ");

    
    return data;
}

function bold(rabalik){
  var abc = document.getElementById('abc').innerText;
  //tls('', 'abc');
  //console.log(document.createRange());
  var DATA = abc;

  
  var DATA = DATA.replace(/AL/g,  "<b>AL</b>");
  var DATA = DATA.replace(/TS/g,  "<b>TS</b>");
  var DATA = DATA.replace(/KH/g,  "<b>KH</b>");
  var DATA = DATA.replace(/DZ/g,  "<b>DZ</b>");
  var DATA = DATA.replace(/SY/g,  "<b>SY</b>");
  var DATA = DATA.replace(/SH/g,  "<b>SH</b>");
  var DATA = DATA.replace(/DH/g,  "<b>DH</b>");
  var DATA = DATA.replace(/TH/g,  "<b>TH</b>");
  var DATA = DATA.replace(/ZH/g,  "<b>ZH</b>");
  var DATA = DATA.replace(/GH/g,  "<b>GH</b>");
  var DATA = DATA.replace(/H/g,  "<b>H</b>");
  var DATA = DATA.replace(/E/g,  "<b>E</b>");
  var DATA = DATA.replace(/A/g,  "<b>A</b>");
  
  var DATA = DATA.replace(/M/g,  "<b>M</b>");
  var DATA = DATA.replace(/W/g,  "<b>W</b>");
  var DATA = DATA.replace(/O/g,  "<b>O</b>");
  var DATA = DATA.replace(/U/g,  "<b>U</b>");
  var DATA = DATA.replace(/I/g,  "<b>I</b>");
  var DATA = DATA.replace(/T/g,  "<b>T</b>");
  var DATA = DATA.replace(/Y/g,  "<b>Y</b>");
  
  var DATA = DATA.replace(/~/g,  "<b>~</b>");
  
  var DATA = DATA.replace(/\n/g,  "<br>");
  var DATA = DATA.replace(/<(?!((?:\/\s*)?(?:br|p|b|u|[o|i]l|li)))([^>])+>/gi,  "");

  // caret
  // var carPos = getCaretPosition(document.getElementById('abc'));
  // var strW = document.getElementById('abc').innerText;
  // console.log(carPos);
  // //console.log(strW.substr(carPos));

  if(rabalik != 'rabalik'){
    var balik = saveCaretPosition(document.getElementById('abc'));
  }

  document.getElementById('abc').innerHTML = DATA;

  if(rabalik != 'rabalik'){
    balik();
  }
  


  // const el = document.getElementById('abc');  
  // const selection = window.getSelection();  
  // const range = document.createRange();  
  // selection.removeAllRanges();  
  // range.selectNodeContents(el);  
  // range.collapse(false);  
  // selection.addRange(range);  
  // el.focus();


}


// function pegonin(){
//   var abc = document.getElementById('abc').value;
//   //alert(abc);
//   console.log(abc);
//   document.getElementById('abt').value = pegonkan(abc);
// }


function pegonin2(){
  var abc = document.getElementById('abc').innerText;
  // alert('via pegonin2');
  //console.log(abc);
  document.getElementById('abt').innerText = pegonkan(abc, true, true);
}


// //listener
// document.getElementById('abc').addEventListener('keyup', (e) => {
//   if((e.key == "Enter")){ 
//     //null
//   }else if ((e.key !== "ArrowRight") && (e.key !== "ArrowLeft") && (e.key !== "ArrowUp") && (e.key !== "ArrowDown")){
//     pegonin2();
//   }
// });


// function potong(){
//   var abc = document.getElementById('abc').innerText;
//   var abc3 = abc.split("@");
//   var inp = '<input list="browsers" name="browser" id="browser"></input>';
//   var tulis = abc3[0] + inp + abc3[2];

//   document.getElementById('abc').innerHTML = tulis;
// }

// function tls(item, id) {
//   //by     l e x i l o g o s
//   var input = document.getElementById(id);
//   if (document.selection) {
//       input.focus();
//       range = document.selection.createRange();
//       range.text = item;
//       range.select();
//   }
//   else if (input.selectionStart || input.selectionStart === '0') {
//       var startPos = input.selectionStart;
//       var endPos = input.selectionEnd;
//       var cursorPos = startPos;
//       var scrollTop = input.scrollTop;
//       var baselength = 0;
//       input.value = input.value.substring(0, startPos)
//           + item
//           + input.value.substring(endPos, input.value.length);
//       cursorPos += item.length;
//       input.focus();
//       input.selectionStart = cursorPos;
//       input.selectionEnd = cursorPos;
//       input.scrollTop = scrollTop;
//   }
//   else {
//       input.value += item;
//       input.focus();
//   }
// }



function saveCaretPosition(context) {
  var selection = window.getSelection();
  var range = selection.getRangeAt(0);
  range.setStart(context, 0);
  var len = range.toString().length;

  return function restore() {
     var pos = getTextNodeAtPosition(context, len);
     selection.removeAllRanges();
     var range = new Range();
     range.setStart(pos.node, pos.position);
     selection.addRange(range);

  }
}

function getTextNodeAtPosition(root, index) {
  const NODE_TYPE = NodeFilter.SHOW_TEXT;
  var treeWalker = document.createTreeWalker(root, NODE_TYPE, function next(elem) {
     if (index > elem.textContent.length) {
        index -= elem.textContent.length;
        return NodeFilter.FILTER_REJECT
     }
     return NodeFilter.FILTER_ACCEPT;
  });
  var c = treeWalker.nextNode();
  return {
     node: c ? c : root,
     position: index
  };
}

var rwyt = [];
var skrg = 1;

function riwayat(){
  rwyt.push(document.getElementById('abc').innerText);
}

function undo(){
  // if(skrg==0){
  //   document.getElementById('abc').innerText = rwyt[rwyt.length - 2];
  //   //skrg = rwyt.length - 1;
  // }else{
  //   document.getElementById('abc').innerText = rwyt[rwyt.length - 2];
  //   //skrg = rwyt.length - 1;
  // }

  if(skrg<rwyt.length){
    skrg = skrg + 1;
    document.getElementById('abc').innerText = rwyt[rwyt.length - skrg];
    // console.log(rwyt.length + '-' +skrg);
    // console.log(rwyt);

    var abc = document.getElementById('abc').innerText;
    document.getElementById('abt').value = pegonkan(abc, false, true);

    document.getElementById('abc').blur();
  }
}

function redo(){
  if(skrg>1){
  skrg = skrg - 1;
  document.getElementById('abc').innerText = rwyt[rwyt.length - skrg];
  // console.log(rwyt.length + '-' +skrg);
  // console.log(rwyt);

  var abc = document.getElementById('abc').innerText;
  document.getElementById('abt').value = pegonkan(abc, false, true);

  document.getElementById('abc').blur();
  }
}

function selectElementContents() {
  var el = document.getElementById("abc");
  var range = document.createRange();
  range.selectNodeContents(el);
  var sel = window.getSelection();
  sel.removeAllRanges();
  sel.addRange(range);
}


function CopyMe(TextToCopy) {
  var TempText = document.createElement("input");
  TempText.value = TextToCopy;
  document.body.appendChild(TempText);
  TempText.select();
  
  document.execCommand("copy");
  document.body.removeChild(TempText);
}

function copy(){
  document.getElementById('abt').classList.remove('w3-animate-opacity');
  CopyMe(document.getElementById('abt').innerText);
  document.getElementById('abt').classList.add('w3-animate-opacity');
  selectElementContents();
}