<?php


require_once('_simplehtmldom/vendor/simplehtmldom/simplehtmldom/simple_html_dom.php');

$html = file_get_html("http://www.notediscover.com/song/mariah-carey-all-i-want-for-christmas-is-you");
$title = $html->find('h1.title');
echo $title[0];








// require_once('_simplehtmldom/vendor/autoload.php');
// use simplehtmldom\HtmlWeb;

// $webParser = new HtmlWeb();
// $htmlDoc = $webParser->load('https://www.notediscover.com/song/mariah-carey-all-i-want-for-christmas-is-you');

// // Check if the document was loaded successfully
// if ($htmlDoc) {
//     // Check if it's an instance of simple_html_dom
//     if ($htmlDoc instanceof simple_html_dom) {
//         // Proceed with finding links
//         foreach ($htmlDoc->find('a') as $anchor) {
//             echo $anchor->href, '<br>';
//         }
//     } else {
//         echo "Error: Unexpected object type after loading HTML.\n";
//     }
// } else {
//     echo "Failed to load the HTML document.\n";
// }

  
// require '_simplehtmldom/vendor/autoload.php'; // Подключение библиотеки SimpleHTMLDOM

// use Sunra\PhpSimple\HtmlDomParser;

// // URL страницы, которую вы хотите скопировать
// $url = 'https://www.notediscover.com/song/mariah-carey-all-i-want-for-christmas-is-you'; // Замените на реальный URL

// // Отправка GET-запроса к странице
// $response = HtmlDomParser::file_get_html($url);

// // Проверка успешности запроса
// if ($response !== false) {
//     // Извлечение информации из div
//     $divContent = $response->find('div[class=col-sm-12 text-center]', 0);

//     // Проверка наличия div на странице
//     if ($divContent) {
//         // Извлечение текста из h1-элементов
//         $title = $divContent->find('h1.title', 0)->plaintext;
//         $bpm = $divContent->find('h1:contains(BPM)', 0)->plaintext;
//         $key = $divContent->find('h1:contains(Key)', 0)->plaintext;

//         echo "Title: $title\n";
//         echo "$bpm\n";
//         echo "$key\n";
//     } else {
//         echo "Div not found on the page.\n";
//     }

//     $response->clear(); // Очистка ресурсов
// } else {
//     echo "Failed to retrieve the page.\n";
// }
?>