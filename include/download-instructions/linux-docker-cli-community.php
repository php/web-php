<p>
On the command line, run the following commands:
</p>
<pre><code class="language-bash line-numbers">
# Pull the PHP Docker image.
docker pull php:<?= $version; ?>-cli

# Launch a container with PHP.
docker run --rm -it --entrypoint bash php:<?= $version; ?>-cli
</code></pre>
