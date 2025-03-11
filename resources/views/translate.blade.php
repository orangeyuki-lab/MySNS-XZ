<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>翻訳ツール</title>
</head>
<body>
    <h1>翻訳ツール</h1>

    <form action="{{ route('translate') }}" method="POST">
        @csrf
        <label for="text">翻訳するテキスト:</label><br>
        <textarea name="text" id="text" rows="4" cols="50">{{ old('text', \$originalText ?? '') }}</textarea><br><br>

        <label for="language">翻訳先の言語:</label><br>
        <select name="language" id="language">
            <option value="en" {{ (isset(\$targetLanguage) && \$targetLanguage == 'en') ? 'selected' : '' }}>英語</option>
            <option value="ja" {{ (isset(\$targetLanguage) && \$targetLanguage == 'ja') ? 'selected' : '' }}>日本語</option>
            <option value="fr" {{ (isset(\$targetLanguage) && \$targetLanguage == 'cn') ? 'selected' : '' }}>中国語</option>
            <option value="es" {{ (isset(\$targetLanguage) && \$targetLanguage == 'es') ? 'selected' : '' }}>スペイン語</option>
        </select><br><br>

        <button type="submit">翻訳</button>
    </form>

    @if (isset(\$translatedText))
        <h2>翻訳結果:</h2>
        <p>{{ \$translatedText }}</p>
    @endif
</body>
</html>
