const textarea = document.getElementById("noteText");

function insert(text)
{
    let endIndex = textarea.selectionEnd;
    let str1 = textarea.value.slice(0, textarea.selectionStart);
    let str2 = textarea.value.slice(textarea.selectionStart);

    textarea.value = str1 + text + str2;
    textarea.selectionStart = textarea.selectionEnd = endIndex + text.length;
}

function boldItalic(type)
{
    let startIndex = textarea.selectionStart;
    let endIndex = textarea.selectionEnd;

    let char = "";
    if (type == "b") { char = "__"; }
    if (type == "i") { char = "*"; }

    let str1 = textarea.value.slice(0, textarea.selectionStart);
    let str2 = textarea.value.slice(textarea.selectionStart, textarea.selectionEnd);
    let str3 = textarea.value.slice(textarea.selectionEnd);

    textarea.value = str1 + char + str2 + char + str3;
    textarea.selectionStart = startIndex + char.length;
    textarea.selectionEnd = endIndex + char.length;
}

function insertHeader(level)
{
    if (level == "1") { insert("# "); }
    if (level == "2") { insert("## "); }
    if (level == "3") { insert("### "); }
    if (level == "4") { insert("#### "); }
    if (level == "5") { insert("##### "); }
    if (level == "6") { insert("###### "); }
}

function insertList(type)
{
    if (type == "ol") { insert("1. "); }
    if (type == "ul") { insert("* "); }
}

function insertLink()
{
    insert("[Название](Ссылка \"Всплывающая подсказка\")");
}

function insertImg()
{
    insert("![Изображение](Ссылка \"Всплывающая подсказка\")");
}

function insertCode()
{
    insert("```\n\n```");
}
