const textarea = document.getElementById("noteText");

function insert(text)
{
    let endIndex = textarea.selectionEnd;
    textarea.value = textarea.value.slice(0, textarea.selectionStart) + text + textarea.value.slice(textarea.selectionEnd);
    textarea.selectionStart = textarea.selectionEnd = endIndex + text.length;
}

function insertHeader(level)
{
    if (level == "1") { insert("#"); }
    if (level == "2") { insert("##"); }
    if (level == "3") { insert("###"); }
    if (level == "4") { insert("####"); }
    if (level == "5") { insert("#####"); }
    if (level == "6") { insert("######"); }
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
