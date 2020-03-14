<!DOCTYPE html>
<html>
    <head>
        <style>
            * {
                font-family: 'Lato', sans-serif;
            }
            h1, h2, p {
                text-align: center;
            }
        </style>
        <title>Three</title>
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <meta name="googlebot-news" content="noindex" />
    </head>
    <body>
        <h1>3/3</h2>
        <h2>Greier du å finne feilen med logikken i kildekoden nedenfor?</h2>
        <p><strong>OBS! Kan være du får et lite anagram. Når du har løst det kan du sende en mail til kontakt@kodesonen.no</strong></p>
		<div style="margin: auto 1em;padding-bottom: 3em;">
		
		<div style="background: #272822; overflow:auto;width:auto;border-width:.1em .1em .1em .8em;padding:.6em .6em;border-radius:2px;"><pre style="margin: 0; line-height: 125%"><span style="color: #75715e">#include &lt;iostream&gt;</span>
		<span style="color: #75715e">#include &lt;string&gt;</span>

		<span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">primes[]</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">{</span> <span style="color: #ae81ff">2</span><span style="color: #f8f8f2">,</span> <span style="color: #ae81ff">11</span><span style="color: #f8f8f2">,</span> <span style="color: #ae81ff">17</span><span style="color: #f8f8f2">,</span> <span style="color: #ae81ff">19</span> <span style="color: #f8f8f2">};</span>

		<span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">string</span> <span style="color: #f8f8f2">foo[]</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">{</span> <span style="color: #e6db74">&quot;Alfa&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Bravo&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Charlie&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Delta&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Echo&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Foxtrot&quot;</span><span style="color: #f8f8f2">,</span>
							 <span style="color: #e6db74">&quot;Golf&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Hotel&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;India&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Juliett&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Kilo&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Lima&quot;</span><span style="color: #f8f8f2">,</span>
							 <span style="color: #e6db74">&quot;Mike&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;November&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Oscar&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Papa&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Quebec&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Romeo&quot;</span><span style="color: #f8f8f2">,</span>
							 <span style="color: #e6db74">&quot;Sierra&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Tango&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Uniform&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Victor&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Whiskey&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;X-ray&quot;</span><span style="color: #f8f8f2">,</span>
							 <span style="color: #e6db74">&quot;Yankee&quot;</span><span style="color: #f8f8f2">,</span> <span style="color: #e6db74">&quot;Zulu&quot;</span> <span style="color: #f8f8f2">};</span>

		<span style="color: #66d9ef">struct</span> <span style="color: #f8f8f2">B</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #66d9ef">virtual</span> <span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">foo(std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">string</span> <span style="color: #f8f8f2">b)</span> <span style="color: #f8f8f2">{</span>
				<span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">a</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">b.at(</span><span style="color: #ae81ff">0</span><span style="color: #f8f8f2">);</span>
				<span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">B</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span><span style="color: #f8f8f2">)a</span> <span style="color: #f92672">-</span> <span style="color: #ae81ff">65</span><span style="color: #f8f8f2">;</span>

				<span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">&lt;</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">sizeof</span><span style="color: #f8f8f2">(primes[</span><span style="color: #ae81ff">0</span><span style="color: #f8f8f2">])</span> <span style="color: #f92672">/</span> <span style="color: #66d9ef">sizeof</span><span style="color: #f8f8f2">(primes));</span> <span style="color: #f8f8f2">j</span><span style="color: #f92672">++</span><span style="color: #f8f8f2">)</span> <span style="color: #f8f8f2">{</span>
					<span style="color: #66d9ef">if</span> <span style="color: #f8f8f2">(B</span> <span style="color: #f92672">==</span> <span style="color: #f8f8f2">primes[j])</span> <span style="color: #f8f8f2">{</span>
						<span style="color: #66d9ef">return</span> <span style="color: #f8f8f2">a;</span>
					<span style="color: #f8f8f2">}</span>
				<span style="color: #f8f8f2">}</span>
			<span style="color: #f8f8f2">}</span>
		<span style="color: #f8f8f2">};</span>

		<span style="color: #66d9ef">struct</span> <span style="color: #f8f8f2">A</span> <span style="color: #f92672">:</span> <span style="color: #f8f8f2">B</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #66d9ef">virtual</span> <span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">foo(</span><span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">b)</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span>
		<span style="color: #f8f8f2">};</span>

		<span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">A</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">foo(</span><span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">b)</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #66d9ef">return</span> <span style="color: #f8f8f2">b;</span>
		<span style="color: #f8f8f2">}</span>

		<span style="color: #66d9ef">struct</span> <span style="color: #f8f8f2">D</span> <span style="color: #f92672">:</span> <span style="color: #f8f8f2">A</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">foo(std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">string</span> <span style="color: #f8f8f2">a)</span> <span style="color: #f8f8f2">override</span> <span style="color: #f8f8f2">{}</span>
		<span style="color: #f8f8f2">};</span>

		<span style="color: #66d9ef">char</span> <span style="color: #a6e22e">a</span><span style="color: #f8f8f2">(std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">string</span> <span style="color: #f8f8f2">a)</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #f8f8f2">D</span><span style="color: #f92672">*</span> <span style="color: #f8f8f2">d;</span>
			<span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">A;</span>

			<span style="color: #f8f8f2">A</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">d.foo(a);</span>

			<span style="color: #66d9ef">return</span> <span style="color: #f8f8f2">D;</span>

		<span style="color: #f8f8f2">}</span>

		<span style="color: #66d9ef">char</span> <span style="color: #a6e22e">b</span><span style="color: #f8f8f2">(std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">string</span> <span style="color: #f8f8f2">b)</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #66d9ef">char</span> <span style="color: #f8f8f2">B;</span>
			<span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">A</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">b.leength();</span>

			<span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">j</span> <span style="color: #f92672">&lt;</span> <span style="color: #f8f8f2">A;</span> <span style="color: #f92672">++</span><span style="color: #f8f8f2">j)</span> <span style="color: #f8f8f2">{</span>
				<span style="color: #f8f8f2">B</span> <span style="color: #f92672">=</span> <span style="color: #f8f8f2">a(b);</span>
			<span style="color: #f8f8f2">}</span>

			<span style="color: #66d9ef">return</span> <span style="color: #f8f8f2">A;</span>
		<span style="color: #f8f8f2">}</span>

		<span style="color: #66d9ef">int</span> <span style="color: #a6e22e">main</span><span style="color: #f8f8f2">()</span> <span style="color: #f8f8f2">{</span>
			<span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">cout</span> <span style="color: #f92672">&lt;&lt;</span> <span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">endl;</span>
			<span style="color: #66d9ef">for</span> <span style="color: #f8f8f2">(</span><span style="color: #66d9ef">int</span> <span style="color: #f8f8f2">i</span> <span style="color: #f92672">=</span> <span style="color: #ae81ff">0</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">i</span> <span style="color: #f92672">&lt;</span> <span style="color: #ae81ff">25</span><span style="color: #f8f8f2">;</span> <span style="color: #f8f8f2">i</span><span style="color: #f92672">++</span><span style="color: #f8f8f2">)</span> <span style="color: #f8f8f2">{</span>
				<span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">cout</span> <span style="color: #f92672">&lt;&lt;</span> <span style="color: #f8f8f2">b(foo[i]);</span>
			<span style="color: #f8f8f2">}</span>
			<span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">cout</span> <span style="color: #f92672">&lt;&lt;</span> <span style="color: #f8f8f2">std</span><span style="color: #f92672">::</span><span style="color: #f8f8f2">endl;</span>
		<span style="color: #f8f8f2">}</span>
		</pre></div>
		</div>
    </body>
</html>