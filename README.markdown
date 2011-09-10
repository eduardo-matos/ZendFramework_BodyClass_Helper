## Instalation
Just drop the file BodyClass.php in `/application/views/helpers/`


## Usage

Just call `$this->bodyClass()` on view scripts (inside the body tag)

## Example

`<body <?php echo $this->bodyClass('my-first-class')->addClass('my-second-class') ?> >`

Would result in:

`<body class="my-first-class my-second-class" >`

This way you can add classes on any part of the application (Bootstrap, Plugins, Controllers, Models...).