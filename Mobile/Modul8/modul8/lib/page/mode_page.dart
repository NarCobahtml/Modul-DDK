import 'package:flutter/material.dart';

class ModePage extends StatelessWidget {
  const ModePage({super.key});

  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      padding: const EdgeInsets.fromLTRB(20, 40, 20, 24),
      child: Column(
        children: const [
          Text(
            'Mode',
            style: TextStyle(
              color: Colors.white,
              fontSize: 20,
              fontWeight: FontWeight.bold,
            ),
          ),
          SizedBox(height: 30),
          _ModeCard(
            imagePath: 'assets/image/tebak_gambar.png',
            title: 'Tebak Gambar',
            description: 'Yuk! Kenali alat musik dari gambarnya',
          ),
          SizedBox(height: 20),
          _ModeCard(
            imagePath: 'assets/image/tebak_suara.png',
            title: 'Tebak Suara',
            description: 'Gunakan pendengaranmu untuk main!',
          ),
          SizedBox(height: 20),
          _ModeCard(
            imagePath: 'assets/image/sejarah_alat.png',
            title: 'Sejarah Alat Musik',
            description: 'Uji pengetahuanmu tentang sejarah!',
          ),
        ],
      ),
    );
  }
}

class _ModeCard extends StatelessWidget {
  final String imagePath;
  final String title;
  final String description;

  const _ModeCard({
    required this.imagePath,
    required this.title,
    required this.description,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      height: 200,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(20),
        image: DecorationImage(image: AssetImage(imagePath), fit: BoxFit.cover),
      ),
      child: Stack(
        children: [
          Container(
            decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(20),
              gradient: LinearGradient(
                begin: Alignment.topCenter,
                end: Alignment.bottomCenter,
                colors: [Colors.black.withAlpha(77), Colors.black.withAlpha(179)],
              ),
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(20),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisAlignment: MainAxisAlignment.end,
              children: [
                Text(
                  title,
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 24,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 4),
                Text(
                  description,
                  style: const TextStyle(color: Colors.white70, fontSize: 14),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
