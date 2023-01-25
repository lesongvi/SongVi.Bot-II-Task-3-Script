<?php
function TranslateDateTime($text)
{
    if (Str_contains($text, "xếp hạng đĩa đơn") || Str_contains($text, "Xếp hạng đĩa đơn") || Str_contains($text, "Singlechart") || Str_contains($text, "singlechart")) return $text;

    $a = "";
    $b = "";
    $c = "";
    $result = "";
    $dt = new DateTime();
    $convertDate = $text;
    $convertDatetemp = $text;


    $count = 0;

    while (true)
    {
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/([Jj]anuary|[Ff]ebruary|[Mm]arch|[Aa]pril|[Mm]ay|[Jj]une|[Jj]uly|[Aa]ugust|[Ss]eptember|[Oo]ctober|[Nn]ovember|[Dd]ecember)\s{1}\d+,\s{1}\d{4}/", $convertDate, $mdatetimeMatch);
        
        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);
            
            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {

                try
                {
                    $dt = strtotime($mdatetimeMatch[0]);
                    $dateOutput = getDate($dt);
                    $a = strlen($dateOutput["mon"]) == 1 ? "0".$dateOutput["mon"] : $dateOutput["mon"];
                    $b = strlen($dateOutput["mday"]) == 1 ? "0".$dateOutput["mday"] : $dateOutput["mday"];
                    $c = $dateOutput["year"];
                    $result = "ngày ".$b." tháng ".$a." năm ".$c;
                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;
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
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/\d+\s{1}([Jj]anuary|[Ff]ebruary|[Mm]arch|[Aa]pril|[Mm]ay|[Jj]une|[Jj]uly|[Aa]ugust|[Ss]eptember|[Oo]ctober|[Nn]ovember|[Dd]ecember)\s{1}\d{4}/", $convertDate, $mdatetimeMatch);

        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);
            
            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {
                try
                {
                    $dt = strtotime($mdatetimeMatch[0]);
                    $dateOutput = getDate($dt);
                    $a = strlen($dateOutput["mon"]) == 1 ? "0".$dateOutput["mon"] : $dateOutput["mon"];
                    $b = strlen($dateOutput["mday"]) == 1 ? "0".$dateOutput["mday"] : $dateOutput["mday"];
                    $c = $dateOutput["year"];
                    $result = "ngày ".$b." tháng ".$a." năm ".$c;
                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;
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
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/([Jj]anuary|[Ff]ebruary|[Mm]arch|[Aa]pril|[Mm]ay|[Jj]une|[Jj]uly|[Aa]ugust|[Ss]eptember|[Oo]ctober|[Nn]ovember|[Dd]ecember)\s{1}\d+\s{1}\d{4}/", $convertDate, $mdatetimeMatch);
        
        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);
            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {
                try
                {
                    $dt = strtotime($mdatetimeMatch[0]);
                    $dateOutput = getDate($dt);
                    $a = strlen($dateOutput["mon"]) == 1 ? "0".$dateOutput["mon"] : $dateOutput["mon"];
                    $b = strlen($dateOutput["mday"]) == 1 ? "0".$dateOutput["mday"] : $dateOutput["mday"];
                    $c = $dateOutput["year"];
                    $result = "ngày ".$b." tháng ".$a." năm ".$c;
                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;
                }
                catch (Exception $e) {
                    break;
                }

            }
        }
        else break;
    }

    // Fix lỗi ngày tháng "Kiểm tra giá trị ngày tháng"
    while (true)
    {
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/(access-date|date)\s*=\s*\d{4}\s*-\s*\d+\s*-\s*\d+\s*(\||})/", $convertDate, $mdatetimeMatch);
        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);

            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {
                try
                {
                    $temp = trim(substr($mdatetimeMatch[0], strpos($mdatetimeMatch[0], "=") + 1));
                    if (Str_contains($mdatetimeMatch[0], "|")) {
                        $temp = trim(substr($temp, 0, strpos($temp, "|")));
                    }
                    else if (Str_contains($mdatetimeMatch[0], "}")) {
                        $temp = trim(substr($temp, 0, strpos($temp, "}")));
                    }

                    $dt = strtotime($temp);
                    $dateOutput = getDate($dt);
                    $a = strlen($dateOutput["mon"]) == 1 ? "0".$dateOutput["mon"] : $dateOutput["mon"];
                    $b = strlen($dateOutput["mday"]) == 1 ? "0".$dateOutput["mday"] : $dateOutput["mday"];
                    $c = $dateOutput["year"];

                    if (Str_contains($mdatetimeMatch[0], "access-date"))
                    {
                        $result = "access-date = ngày ".$b." tháng ".$a." năm ".$c;
                    }
                    else
                    {
                        $result = "access-date = ngày ".$b." tháng ".$a." năm ".$c;
                    }

                    if (Str_contains($mdatetimeMatch[0], "}"))
                    {
                        $result .= "}";
                    }
                    else $result .= " |";

                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;

                }
                catch (Exception $e)
                {
                    echo $e;
                    break;
                }

            }
        }
        else break;
    }

    while (true)
    {
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/(access-date|date)\s*=\s*\d+\s*-\s*\d+\s*-\s*\d{4}\s*(\||})/", $convertDate, $mdatetimeMatch);
        
        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);
            
            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {
                try
                {
                    $temp = trim(substr($mdatetimeMatch[0], strpos($mdatetimeMatch[0], "=") + 1));
                    if (Str_contains($mdatetimeMatch[0], "|")) {
                        $temp = trim(substr($temp, 0, strpos($temp, "|")));
                    }
                    else if (Str_contains($mdatetimeMatch[0], "}")) {
                        $temp = trim(substr($temp, 0, strpos($temp, "}")));
                    }

                    $s = explode("-", $temp);
                    $dt = strtotime($s[2]."-".$s[1]."-".$s[0]);
                    $dateOutput = getDate($dt);
                    
                    $a = strlen($dateOutput["mon"]) == 1 ? "0".$dateOutput["mon"] : $dateOutput["mon"];
                    $b = strlen($dateOutput["mday"]) == 1 ? "0".$dateOutput["mday"] : $dateOutput["mday"];
                    $c = $dateOutput["year"];

                    if (Str_contains($mdatetimeMatch[0], "access-date"))
                    {
                        $result = "access-date = ngày ".$b." tháng ".$a." năm ".$c;
                    }
                    else
                    {
                        $result = "access-date = ngày ".$b." tháng ".$a." năm ".$c;
                    }

                    if (Str_contains($mdatetimeMatch[0], "}"))
                    {
                        $result .= "}";
                    }
                    else $result .= " |";

                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;
                }
                catch (Exception $e)
                {
                    echo $e;
                    break;
                }
            }
        }
        else break;
    }

    #region Fix lỗi 2ngày 2 tháng 4 năm 2012
    while (true)
    {
        if ($count >= 100) break;
        $count++;

        $mdatetime = preg_match("/\d+[Nn]gày\s{1}\d+\s{1}tháng/", $convertDate, $mdatetimeMatch);
        
        if ($mdatetime != 0)
        {
            $mdatetimeMatchIdx = strpos($text, $mdatetimeMatch[0]);
            $mfile = preg_match("/.*\.(jpg|JPG|jpeg|JPEG|gif|ogg|OGG|GIF|flac|FLAC|svg|SVG)/", substr($convertDate, $mdatetimeMatchIdx), $mfileMatch);
            
            if ($mfileMatch != 0 && Str_contains($mfileMatch[0], $mdatetimeMatch[0])) {
                $mfileMatchIdx = strpos(substr($convertDate, $mdatetimeMatchIdx), $mfileMatch[0]);
                $convertDate = substr($convertDate, $mfileMatchIdx + strlen($mfileMatch[0]));
                $convertDatetemp = $convertDate;
                continue;
            }
            else
            {
                try
                {
                    $b = substr($mdatetimeMatch[0], 0, 1)."".substr($mdatetimeMatch[0], strpos($mdatetimeMatch[0], "ngày ") + 5, 1);

                    $result = "ngày ".$b." tháng";
                    $convertDate = str_replace($mdatetimeMatch[0], $result, $convertDate);
                    $text = str_replace($convertDatetemp, $convertDate, $text);
                    $convertDatetemp = $convertDate;
                }
                catch (Exception $e)
                {
                    echo $e;
                    break;
                }
            }
        }
        else break;
    }
    #endregion
    return $text;
}
