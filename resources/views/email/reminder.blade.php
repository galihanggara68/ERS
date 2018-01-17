<body>
    <h3>Halo {{ $detail['email'] }}</h3>
    <br>
    <p>Sesorang meminta untuk merubah password andaa
        <br>
        Jika itu bukan anda, abaikan pesan ini
        <br>
        Jika anda ingin merubah password anda klik tautan berikut
        {{ link_to_route('reminder.edit', 'Klik Di Sini', ['id' => $detail['id'], 'code' => $detail['code']]) }}
        <h4>Terimakasih</h4>
    </p>
</body>