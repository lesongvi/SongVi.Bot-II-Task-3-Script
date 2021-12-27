<?php 
function setReference ($text, $wikins) {
    if (!notMainNS()) return $text;
    
    //Các bản mẫu định hướng, redirect
    $dis = preg_match("/\{\{\s*[Dd][Ii][Ss]/mi", $text);
    $dab = preg_match("/\{\{\s*[Dd][Aa][Bb]/mi", $text);
    $dinhhuong = preg_match("/\{\{\s*[Đđ][Ịị][Nn][Hh]\s*[Hh][Ưư][Ớớ][Nn][Gg]/mi", $text);
    $trangdinhhuong = preg_match("/\{\{[Tt]rang\s*[Đđ]ịnh\s*[Hh]ướng/mi", $text);
    $TLAdisambig = preg_match("/\{\{\s*[Tt][Ll][Aa]disambig/mi", $text);
    $redirectvn = preg_match("/\#\s*[Đđ][Ổổ][Ii]/mi", $text);
    $redirect = preg_match("/\#\s*[Rr][Ee][Dd][Ii][Rr][Ee][Cc][Tt]/mi", $text);


    if ($dis != 0 || $dab != 0 || $dinhhuong != 0 || $TLAdisambig != 0 || $redirectvn != 0 || $redirect != 0 || $trangdinhhuong != 0) return $text;

    //Bản mẫu chú thích
    $reflist = preg_match("/\{\{\s*[Rr][eé]f/", $text);
    $thamkhao = preg_match("/\{\{[Tt]ham\s*[Kk]hảo/", $text);
    $references = preg_match("/\<\s*[Rr]eferences/", $text);
    $notes = preg_match("/\{\{[Nn]ote/", $text);

    //Nguồn
    $sfn = preg_match("/\{\{\s*[Ss]fn/", $text);
    $refTag = preg_match("/\{\{\s*[Rr]efTag/", $text);
    $refs = preg_match("/\<\s*[Rr]ef/", $text);

    $thamkhaosection = preg_match("/==\s*[Tt]ham\s*[Kk]hảo\s*==/", $text, $thamkhaosectionMatch);
    $chuthichsection = preg_match("/==\s*[Cc]hú\s*[Tt]hích\s*==/", $text, $chuthichsectionMatch);
    $category = preg_match("/\[\[[Tt]hể\s*[Ll]oại/", $text, $categoryMatch);
    $externalLink = preg_match("/==\s*[Ll]iên\s*[Kk]ết\s*[Nn]goài\s*==/", $text, $externalLinkMatch);
    $stub = preg_match("/\{\{[Ss]ơ\s*[Kk]hai/", $text, $stubIdxMatch);
    $stubEnglish = preg_match("/\{\{.*stub.*\}\}/", $text);
    $verystub = preg_match("/\{\{[Rr]ất\s*[Ss]ơ\s*[Kk]hai/", $text, $verystubMatch);
    $taxobox = preg_match("/\{\{[Tt]axobox/", $text);

    // Add nhãn sơ khai
    if (strlen($text) <= 5000 && $stub == 0 && $verystub == 0 && $stubEnglish == 0)
    {
        if ($category != 0)
        {
            $categoryIdx = strpos($text, $categoryMatch[0]);
            if ($taxobox != 0)
            {
                return substr_replace($text, "{{sơ khai sinh học}}\r\n", $categoryIdx, 0);
            }
            else return substr_replace($text, "{{sơ khai}}\r\n", $categoryIdx, 0);
        }
        else
        {
            if ($taxobox != 0) $text .= "\r\n{{sơ khai sinh học}}";
            else $text .= "\r\n{{sơ khai}}";
        }
        // Set lại vị trí nếu đã thêm bản mẫu Sơ khai
        $stub = preg_match("/\{\{[Ss]ơ\s*[Kk]hai/", $text);
    }

    // Add nhãn tham khảo
    if ($reflist == 0 && $thamkhao == 0 && $references == 0 && $notes == 0)
    {
        if ($thamkhaosection != 0) {
            $thamkhaosectionIdx = strpos($text, $thamkhaosectionMatch[0]);
            return substr_replace($text, "\r\n{{tham khảo}}", $thamkhaosectionIdx + strlen($thamkhaosectionMatch[0]), 0);
        }
        if ($chuthichsection != 0) {
            $chuthichsectionIdx = strpos($text, $chuthichsectionMatch[0]);
            return substr_replace($text, "\r\n{{tham khảo}}", $chuthichsectionIdx + strlen($chuthichsectionMatch[0]), 0);
        }
        if ($externalLink != 0) {
            $externalLinkIdx = strpos($text, $externalLinkMatch[0]);
            return substr_replace($text, "==Tham khảo==\r\n{{tham khảo}}\r\n", $externalLinkIdx, 0);
        }
        if ($stub != 0) {
            $stubIdx = strpos($text, $stubIdxMatch[0]);
            return substr_replace($text, "==Tham khảo==\r\n{{tham khảo}}\r\n", $stubIdx, 0);
        }
        if ($verystub != 0) {
            $verystubIdx = strpos($text, $verystubMatch[0]);
            return substr_replace($text, "==Tham khảo==\r\n{{tham khảo}}\r\n", $verystubIdx, 0);
        }
        if ($category != 0) {
            $categoryIdx = strpos($text, $categoryMatch[0]);
            return substr_replace($text, "==Tham khảo==\r\n{{tham khảo}}\r\n", $categoryIdx, 0);
        }

        return $text."\r\n==Tham khảo==\r\n{{tham khảo}}\r\n";
    }

    // Kiểm tra trang định hướng với tiêu đề bài viết

    return $text;
}
