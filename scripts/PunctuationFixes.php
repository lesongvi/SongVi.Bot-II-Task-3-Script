<?php
function PunctuationFixes($text, $title) {
    #region Punctuation
    $convertPunctuation = $text;
    $convertPunctuationTemp = $text;

    // Exclude internet domain articles
    $domainname = preg_match("/\.\w{2}/", $title, $domainnameMatch);

    if (!Str_contains($text, "Tên miền") && $domainname == 0)
    {
        $count = 0;
        while (true)
        {
            if ($count >= 100) break;
            $count++;

            $punctuation = preg_match("/\w{1}\s{1,2}[.,;:)]/", $text, $punctuationMatch);

            if ($punctuation != 0)
            {
                $punctuationMatchIdx = strpos($text, $punctuationMatch[0]);
                // Tạm bỏ ;: vì lỗi đầu dòng
                $error = preg_match("/\w{1}\s{1,2}\n[.,;:)]/", $punctuationMatch[0], $errorMatch);

                if ($error != 0)
                {
                    $errorMatchIdx = strpos($punctuationMatch[0], $errorMatch[0]);
                    $convertPunctuation = substr($convertPunctuation, $errorMatchIdx + strlen($errorMatch[0]));
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }
                
                $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch);
                if ($mfile != 0 && Str_contains($mfileMatch[0], $punctuationMatch[0]))
                {
                    $mfileMatchIdx = strpos(substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch[0]);
                    $convertPunctuation = substr($convertPunctuation, $mfileMatchIdx + strlen($mfileMatch[0]));
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }
                else
                {
                    try
                    {
                        $convertPunctuation = str_replace($punctuationMatch[0], substr($punctuationMatch[0], 0, strlen($punctuationMatch[0]) - 2)."".substr($punctuationMatch[0], strlen($punctuationMatch[0]) - 1, 1), $convertPunctuation);
                        $text = str_replace($convertPunctuationTemp, $convertPunctuation, $text);
                        $convertPunctuationTemp = $convertPunctuation;
                    }
                    catch (Exception $e) {
                        break;
                    }
                }

            }
            else break;

        }
        $convertPunctuation = $text;
        $convertPunctuationTemp = $text;
        $count = 0;
        while (true)
        {
            if ($count >= 100) break;
            $count++;

            $punctuation = preg_match("/[(]\s{1,2}\w{1}/", $convertPunctuation, $punctuationMatch);
            if ($punctuation != 0)
            {
                $punctuationMatchIdx = strpos($text, $punctuationMatch[0]);
                $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG|svg|SVG)/", substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch);
                if ($mfile != 0 && Str_contains($mfileMatch[0], $punctuationMatch[0])) {
                    $mfileMatchIdx = strpos(substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch[0]);
                    
                    $convertPunctuation = substr($convertPunctuation, $mfileMatchIdx + strlen($mfileMatch[0]));
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }
                else
                {
                    try
                    {
                        $convertPunctuation = str_replace($punctuationMatch[0], substr($punctuationMatch[0], 0, 1)."".substr($punctuationMatch[0], 2), $convertPunctuation);
                        $text = str_replace($convertPunctuationTemp, $convertPunctuation, $text);
                        $convertPunctuationTemp = $convertPunctuation;
                    }
                    catch (Exception $e) {
                        break;
                    }
                }
            }
            else break;

        }

        $count = 0;
        // Trường hợp ( [[abc]]) => ([[abc]])
        while (true)
        {
            if ($count >= 100) break;
            $count++;

            $punctuation = preg_match("/[(]\s{1,2}\[\[\w{1}/", $convertPunctuation, $punctuationMatch);
            if ($punctuation != 0)
            {
                $punctuationMatchIdx = strpos($text, $punctuationMatch[0]);
                $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG|svg|SVG)/", substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch);
                if ($mfile != 0 && Str_contains($mfileMatch[0], $punctuationMatch[0]))
                {
                    $mfileMatchIdx = strpos(substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch[0]);
                    
                    $convertPunctuation = substr($convertPunctuation, $mfileMatchIdx + strlen($mfileMatch[0]));
                    
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }
                else
                {
                    try
                    {
                        $convertPunctuation = str_replace($punctuationMatch[0], substr($punctuationMatch[0], 0, 1)."".substr($punctuationMatch[0], 2), $convertPunctuation);
                        $text = str_replace($convertPunctuationTemp, $convertPunctuation, $text);
                        $convertPunctuationTemp = $convertPunctuation;
                    }
                    catch (Exception $e) {
                        break;
                    }
                }

            }
            else break;
        }

        $count = 0;

        while (true)
        {

            if (count >= 100) break;
            $count++;

            $punctuation = preg_match("/\w{1}\]\]\s{1,2}[.,;:)]/", $convertPunctuation, $punctuationMatch);
            if ($punctuation != 0)
            {
                // Sửa ;: vì lỗi đầu dòng
                $error = preg_match("/\w{1}\]\]\s{1,2}\n[.,;:)]/", $punctuationMatch[0], $errorMatch);

                if ($error != 0)
                {
                    $errorMatchIdx = strpos($punctuationMatch[0], $errorMatch[0]);
                    
                    $convertPunctuation = substr($convertPunctuation, $errorMatchIdx + strlen($errorMatch[0]));
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }

                $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch);
                if ($mfile != 0 && Str_contains($mfileMatch[0], $punctuationMatch[0])) {
                    $mfileMatchIdx = strpos(substr($convertPunctuation, $punctuationMatchIdx), $mfileMatch[0]);
                    $convertPunctuation = substr($convertPunctuation, $mfileMatchIdx + strlen($mfileMatch[0]));
                    $convertPunctuationTemp = $convertPunctuation;
                    continue;
                }
                else
                {
                    try
                    {
                        $convertPunctuation = str_replace($punctuationMatch[0], substr($punctuationMatch[0], 0, 3)."".substr($punctuationMatch[0], 4), $convertPunctuation);
                        $text = str_replace($convertPunctuationTemp, $convertPunctuation, $text);
                        $convertPunctuationTemp = $convertPunctuation;
                    }
                    catch (Exception $e) {
                        break;
                    }


                }

            }
            else break;

        }

    }

    #endregion
    return $text;
}
