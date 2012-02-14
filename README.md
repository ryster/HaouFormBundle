# README

HaouFormBundleとは？
-------------------------------------------------------
Symfony2のFormコンポーネント拡張バンドルです。
現在は下記のような機能が実装されています。

- フォームの凍結機能（HTML_QuickFormのfreezingのようなもの）
- フォームへのヘルプメッセージ機能

# インストール手順
まずは既にインストールされているSymfony2のdepsを利用してバンドルをダウンロードします。
depsファイルに下記を追記してください。

### deps
    [HaouFormBundle]
        git=git://github.com/ryster/HaouFormBundle.git
        target=bundles/Haou/FormBundle

depsに記述した後はコンソールにてプロジェクトのルートディレクトリまで移動し、下記のコマンドを実行

    php bin/vendor install

次にオートローダーの設定を行います。

### app/autoload.php

    $loader->registerNamespaces(array(
        // ...
        'Haou' => __DIR__.'/../vendor/bundles',
    ));

最後にAppKernelにバンドルを登録してインストール完了です。

### app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Haou\FormBundle\HaouFormBundle(),
        );
        // ...
    }

# 利用方法
ちゃんと書くまではこちらをどうぞ
http://d.hatena.ne.jp/ryster/20111221/1324477500