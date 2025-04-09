<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário Minecraft</title>
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp2757874.jpg'); 
            background-size: cover;
            font-family: Arial, sans-serif;
            color: red;
        }
        .inventory {
            display: grid;
            grid-template-columns: repeat(8, 80px);
            gap: 10px;
            padding: 40px;
            justify-content: center;
        }
        .item {
            width: 80px;
            height: 80px;
            background-color: rgb(242, 243, 245);
            border: 2px solid #ccc;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .item:hover {
            transform: scale(1.1);
        }
        .item img {
            width: 100%;
            height: 100%;
            border-radius: 8px;
        }
        .tooltip {
            visibility: hidden;
            background-color: rgb(245, 241, 241);
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
        }
        .item:hover .tooltip {
            visibility: visible;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center; margin-top:20px;">Inventário Minecraft</h1>
    <div class="inventory">
        <?php
        $items = [
            ["name" => "Bloco de Grama", "img" => "https://img1.cgtrader.com/items/2042590/c9ce1e9115/minecraft-grass-block-3d-model-obj-mtl-blend.jpg"],
            ["name" => "Bloco de Pedra", "img" => "https://th.bing.com/th/id/OIP.KvCfF44IDBnHxAjmJxXcWwAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Areia", "img" => "https://th.bing.com/th/id/R.aa0d52830e97722f10cdea28ad541e87?rik=SVYVEhpBwI2%2bJA&pid=ImgRaw&r=0"],
            ["name" => "Madeira de Carvalho", "img" => "https://th.bing.com/th/id/R.5757ae057452cf5701ed32ca01af0cfd?rik=cC%2b0Hzg4llunBg&pid=ImgRaw&r=0"],
            ["name" => "Tijolo", "img" => "https://th.bing.com/th/id/OIP.lmicU87WOKOV5tcY8QhFLAAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Vidro", "img" => "https://th.bing.com/th/id/R.651403935d1bca526ff900c97681d29a?rik=11%2fXs5rQMD9WuA&pid=ImgRaw&r=0&sres=1&sresct=1"],
            ["name" => "Ouro", "img" => "https://media.sketchfab.com/models/f64a638eecc24c128d665a6a015e203d/thumbnails/f9e6d56dfb1647e0a3d45b57fd3344c4/be2004dd978d4f11b8802fde3bd7c69a.jpeg"],
            ["name" => "Diamante", "img" => "https://www.pngkey.com/png/full/51-510502_diamond-pattern-png.png"],
            ["name" => "Carvão", "img" => "https://th.bing.com/th/id/R.13a91643843fb470f258d3d506fe98ed?rik=OwPg9u53ezgDdg&pid=ImgRaw&r=0"],
            ["name" => "Lã Branca", "img" => "https://th.bing.com/th/id/OIP.bHFaCQcGG5g4nHbetYZVJQAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Lã Azul", "img" => "https://gamepedia.cursecdn.com/minecraft_br_gamepedia/thumb/d/da/L%C3%A3_Azul.png/150px-L%C3%A3_Azul.png?version=9ea7b5ddd51a5d7c39acec26e7f8c92c"],
            ["name" => "Lã Vermelha", "img" => "https://th.bing.com/th/id/OIP.KgbeLZnVWdYazgJK19zvMwAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Lã Verde", "img" => "https://gamepedia.cursecdn.com/minecraft_br_gamepedia/thumb/2/2c/L%C3%A3_Verde_Lim%C3%A3o.png/150px-L%C3%A3_Verde_Lim%C3%A3o.png?version=31ad3cd57029aadb0db7cb75fa8feb6a"],
            ["name" => "Bloco de Ferro", "img" => "https://gamepedia.cursecdn.com/minecraft_gamepedia/7/7e/Block_of_Iron_JE4_BE3.png"],
            ["name" => "Bloco de Esmeralda", "img" => "https://i.ytimg.com/vi/eFfvXhyXcjs/hqdefault.jpg"],
            ["name" => "Bloco de Quartzo", "img" => "https://th.bing.com/th/id/OIP.bsG5RDY3UeiojsAPNAFeXAAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Folhas de Carvalho", "img" => "https://th.bing.com/th/id/R.404879db42b1ba718fbfbd4a6f031eba?rik=2wPRhsUnvIvFVg&pid=ImgRaw&r=0"],
            ["name" => "Bloco de Melancia", "img" => "https://gamepedia.cursecdn.com/minecraft_br_gamepedia/7/7f/Melancia_%28bloco%29.png?version=0832afe97ca8191542b8e53c73aafe46"],
            ["name" => "Bloco de Feno", "img" => "https://minecraft.wiki/images/Hay_Bale_(NS)_JE2_BE2.png?5f68e"],
            ["name" => "Mesa de Encantamento", "img" => "https://minecraft.wiki/images/thumb/Enchanting_library.png/600px-Enchanting_library.png?de9f8"],
            ["name" => "Bigorna", "img" => "https://th.bing.com/th/id/OIP.FHoZ2JdeuFSZL13mlxbZzgAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Forno", "img" => "https://th.bing.com/th/id/OIP.kceV1WiErKFxv1ROLVEdVQHaEK?rs=1&pid=ImgDetMain"],
            ["name" => "Baú", "img" => "https://gamepedia.cursecdn.com/minecraft_br_gamepedia/d/d4/Locked_Chest.png"],
            ["name" => "Caldeirão", "img" => "https://th.bing.com/th/id/OIP.UCeaifGeAozTS4BpQ1bCOgAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Mesa de Trabalho", "img" => "https://th.bing.com/th/id/OIP.wHdXUktOFa0rrXlDirzeLAHaE8?rs=1&pid=ImgDetMain"],
            ["name" => "Bloco de Slime", "img" => "https://th.bing.com/th/id/R.adb859357f9bdf8d6fea272260a62cf4?rik=4Zex2FtntAjqdg&pid=ImgRaw&r=0"],
            ["name" => "Bloco de Notas", "img" => "https://th.bing.com/th/id/OIP.k0Ps6S4aNMeS8wV8F3p8CgHaEN?rs=1&pid=ImgDetMain"],
            ["name" => "Tocha", "img" => "https://gamepedia.cursecdn.com/minecraft_br_gamepedia/9/98/Tocha.png?version=a75b9bf8dfd2c94facc785278e648860"],
            ["name" => "Porta de Carvalho", "img" => "https://th.bing.com/th/id/OIP.qTaoXP3mh_Ra8vLPIAEx5gAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Lápis-Lazúli", "img" => "https://th.bing.com/th/id/OIP.M4pCbnD_KpiD4pqtKzpBmgAAAA?rs=1&pid=ImgDetMain"],
            ["name" => "Pistão", "img" => "https://th.bing.com/th/id/OIP.SLNGGi6cm789MESdTT3BLAHaD5?w=1335&h=702&rs=1&pid=ImgDetMain"],
            ["name" => "Redstone", "img" => "https://th.bing.com/th/id/OIP.geAASDEgEjhwcwlgPeDdQQHaHI?rs=1&pid=ImgDetMain"],
        ];

        foreach ($items as $item) {
            echo '<div class="item">';
            echo '<img src="' . $item['img'] . '" alt="' . $item['name'] . '">';
            echo '<div class="tooltip">' . $item['name'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
