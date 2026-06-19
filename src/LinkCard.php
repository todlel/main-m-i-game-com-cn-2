<?php

/**
 * Renders a link card as a safe HTML snippet.
 *
 * @param string $url
 * @param string $title
 * @param string $description
 * @param string $keyword
 * @return string
 */
function renderLinkCard(string $url, string $title, string $description, string $keyword = ''): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';
    $html .= '<div class="link-card-title">' . $safeTitle . '</div>';
    if ($safeDesc !== '') {
        $html .= '<div class="link-card-desc">' . $safeDesc . '</div>';
    }
    if ($safeKeyword !== '') {
        $html .= '<div class="link-card-keyword">' . $safeKeyword . '</div>';
    }
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * Renders a default link card for a gaming topic.
 *
 * @return string
 */
function renderDefaultGameLinkCard(): string
{
    $url = 'https://main-m-i-game.com.cn';
    $title = '爱游戏 - 精彩游戏平台';
    $description = '探索最新最热的游戏，享受极致娱乐体验。';
    $keyword = '爱游戏';

    return renderLinkCard($url, $title, $description, $keyword);
}

/**
 * Renders a sample link card with provided data.
 *
 * @return string
 */
function renderSampleLinkCard(): string
{
    $data = [
        'url' => 'https://main-m-i-game.com.cn',
        'title' => '爱游戏 - 热门推荐',
        'description' => '汇聚海量游戏，每天都有新发现。',
        'keyword' => '爱游戏',
    ];

    return renderLinkCard(
        $data['url'],
        $data['title'],
        $data['description'],
        $data['keyword']
    );
}

/**
 * Builds a link card using an associative array.
 * The array must contain 'url' and 'title' keys.
 * Optional keys: 'description', 'keyword'.
 *
 * @param array $cardData
 * @return string
 */
function buildLinkCardFromArray(array $cardData): string
{
    $defaults = [
        'url' => '',
        'title' => '',
        'description' => '',
        'keyword' => '',
    ];

    $merged = array_merge($defaults, $cardData);

    return renderLinkCard(
        $merged['url'],
        $merged['title'],
        $merged['description'],
        $merged['keyword']
    );
}

// Example usage (commented out):
// echo renderDefaultGameLinkCard();
// echo renderSampleLinkCard();
// $myCard = buildLinkCardFromArray([
//     'url' => 'https://main-m-i-game.com.cn',
//     'title' => '爱游戏 - 新游上线',
//     'description' => '第一时间体验最新游戏大作。',
//     'keyword' => '爱游戏',
// ]);
// echo $myCard;