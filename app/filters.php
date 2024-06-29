App::after(function($request, $response)
{
  
        if($response instanceof Illuminate\Http\Response)
        {
            $buffer = $response->getContent();
            if(strpos($buffer,'<pre>') !== false)
            {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/\r"                      => '',
                    "/>\n</"                    => '><',
                    "/>\s+\n</"    				=> '><',
                    "/>\n\s+</"					=> '><',
                );
            }
            else
            {
                $replace = array(
                    '/<!--[^\[](.*?)[^\]]-->/s' => '',
                    "/\n([\S])/"                => '$1',
                    "/\r/"                      => '',
                    "/\n/"                      => '',
                    "/\t/"                      => '',
                    "/ +/"                      => ' ',
                );
            }
            $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
            $response->setContent($buffer);
    }
});