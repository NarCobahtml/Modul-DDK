import 'package:flutter/material.dart';

class RewardPage extends StatelessWidget {
  final VoidCallback onOpenLeaderboard;

  const RewardPage({super.key, required this.onOpenLeaderboard});

  @override
  Widget build(BuildContext context) {
    return SingleChildScrollView(
      padding: const EdgeInsets.fromLTRB(20, 40, 20, 24),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Container(
            padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
            decoration: BoxDecoration(
              gradient: const LinearGradient(
                begin: Alignment.topCenter,
                end: Alignment.bottomCenter,
                colors: [Color(0xFF241D66), Color(0xFF141040)],
                stops: [0.03, 1.0],
              ),
              borderRadius: BorderRadius.circular(50),
            ),
            child: Row(
              mainAxisSize: MainAxisSize.min,
              children: [
                const Text(
                  '2,123',
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(width: 8),
                Image.asset(
                  'assets/image/icon_footer4.png',
                  width: 16,
                  height: 16,
                  color: const Color(0xFFF59E0B),
                ),
              ],
            ),
          ),
          const SizedBox(height: 24),
          const Text(
            'Koleksi Instrumen',
            style: TextStyle(
              color: Color(0xFFF59E0B),
              fontSize: 20,
              fontWeight: FontWeight.bold,
            ),
          ),
          const SizedBox(height: 16),
          SizedBox(
            height: 150,
            child: ListView(
              scrollDirection: Axis.horizontal,
              children: const [
                _InstrumentCard(
                  imagePath: 'assets/image/gambar_angklung.png',
                  name: 'Angklung',
                  region: 'Jawa Barat',
                ),
                SizedBox(width: 12),
                _InstrumentCard(
                  imagePath: 'assets/image/gambar_gamelan.png',
                  name: 'Gamelan',
                  region: 'Jawa Tengah',
                ),
                SizedBox(width: 12),
                _InstrumentCard(
                  imagePath: 'assets/image/gambar_kolintang.png',
                  name: 'Kolintang',
                  region: 'Sulawesi Utara',
                ),
              ],
            ),
          ),
          const SizedBox(height: 24),
          Container(
            padding: const EdgeInsets.all(20),
            decoration: BoxDecoration(
              gradient: LinearGradient(
                begin: Alignment.centerLeft,
                end: Alignment.centerRight,
                colors: [const Color(0xFFF59E0B).withAlpha(51), Colors.transparent],
                stops: const [0.2, 1.0],
              ),
              color: const Color(0xFF3D2F1F),
              borderRadius: BorderRadius.circular(16),
            ),
            child: Row(
              children: [
                Image.asset(
                  'assets/image/icon_calendar.png',
                  width: 48,
                  height: 48,
                  color: const Color(0xFFF59E0B),
                ),
                const SizedBox(width: 16),
                const Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        'Bonus Login Harian',
                        style: TextStyle(
                          color: Color(0xFFF59E0B),
                          fontSize: 16,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      SizedBox(height: 4),
                      Text(
                        'Klaim bonus harianmu untuk menjaga rutinitas!',
                        style: TextStyle(color: Colors.white70, fontSize: 12),
                      ),
                    ],
                  ),
                ),
                const SizedBox(width: 12),
                Container(
                  padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
                  decoration: BoxDecoration(
                    gradient: const LinearGradient(
                      begin: Alignment.topCenter,
                      end: Alignment.bottomCenter,
                      colors: [Color(0xFF241D66), Color(0xFF141040)],
                      stops: [0.03, 1.0],
                    ),
                    borderRadius: BorderRadius.circular(50),
                    border: Border.all(color: const Color(0xFFF59E0B), width: 1),
                  ),
                  child: Row(
                    children: [
                      const Text(
                        '+100',
                        style: TextStyle(
                          color: Colors.white,
                          fontSize: 12,
                          fontWeight: FontWeight.bold,
                        ),
                      ),
                      const SizedBox(width: 4),
                      Image.asset(
                        'assets/image/icon_footer4.png',
                        width: 16,
                        height: 16,
                        color: const Color(0xFFF59E0B),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
          const SizedBox(height: 24),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              const Expanded(
                child: Text(
                  'Misi Yang Aktif',
                  style: TextStyle(
                    color: Color(0xFFF59E0B),
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              Text(
                'Reset dalam 9 jam',
                style: TextStyle(
                  color: Colors.white.withAlpha(153),
                  fontSize: 12,
                ),
              ),
            ],
          ),
          const SizedBox(height: 16),
          const _MissionCard(
            title: 'Selesaikan 3 Kuis Tebak Suara',
            progress: 0.6,
            reward: 50,
          ),
          const SizedBox(height: 12),
          const _MissionCard(
            title: 'Identifikasi 5 Instrumen Bambu',
            progress: 0.2,
            reward: 75,
          ),
          const SizedBox(height: 24),
          _UnlockInstrumentCard(
            imagePath: 'assets/image/gambar_sasando.png',
            name: 'Sasando',
            description: 'Buka alat musik khas Nusa Tenggara Timur',
            price: 5000,
            onPressed: onOpenLeaderboard,
          ),
        ],
      ),
    );
  }
}

class _InstrumentCard extends StatelessWidget {
  final String imagePath;
  final String name;
  final String region;

  const _InstrumentCard({
    required this.imagePath,
    required this.name,
    required this.region,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      width: 120,
      decoration: BoxDecoration(
        gradient: const LinearGradient(
          begin: Alignment.topCenter,
          end: Alignment.bottomCenter,
          colors: [Color(0xFF241D66), Color(0xFF141040)],
          stops: [0.03, 1.0],
        ),
        borderRadius: BorderRadius.circular(16),
      ),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Image.asset(imagePath, width: 70, height: 70),
          const SizedBox(height: 12),
          Text(
            name,
            style: const TextStyle(
              color: Colors.white,
              fontSize: 16,
              fontWeight: FontWeight.bold,
            ),
          ),
          Text(
            region,
            style: const TextStyle(color: Colors.white70, fontSize: 12),
          ),
        ],
      ),
    );
  }
}

class _MissionCard extends StatelessWidget {
  final String title;
  final double progress;
  final int reward;

  const _MissionCard({
    required this.title,
    required this.progress,
    required this.reward,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(16),
      decoration: BoxDecoration(
        gradient: const LinearGradient(
          begin: Alignment.topCenter,
          end: Alignment.bottomCenter,
          colors: [Color(0xFF241D66), Color(0xFF141040)],
          stops: [0.03, 1.0],
        ),
        borderRadius: BorderRadius.circular(16),
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Row(
            children: [
              Expanded(
                child: Text(
                  title,
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 16,
                    fontWeight: FontWeight.w600,
                  ),
                ),
              ),
              Image.asset(
                'assets/image/icon_footer4.png',
                width: 16,
                height: 16,
                color: const Color(0xFFF59E0B),
              ),
              Text(
                ' +$reward',
                style: const TextStyle(
                  color: Color(0xFFF59E0B),
                  fontSize: 14,
                  fontWeight: FontWeight.bold,
                ),
              ),
            ],
          ),
          const SizedBox(height: 8),
          ClipRRect(
            borderRadius: BorderRadius.circular(8),
            child: LinearProgressIndicator(
              value: progress,
              backgroundColor: Colors.white24,
              valueColor: const AlwaysStoppedAnimation<Color>(Color(0xFFF59E0B)),
              minHeight: 8,
            ),
          ),
        ],
      ),
    );
  }
}

class _UnlockInstrumentCard extends StatelessWidget {
  final String imagePath;
  final String name;
  final String description;
  final int price;
  final VoidCallback onPressed;

  const _UnlockInstrumentCard({
    required this.imagePath,
    required this.name,
    required this.description,
    required this.price,
    required this.onPressed,
  });

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(16),
      decoration: BoxDecoration(
        color: const Color(0xff1d1a3d),
        borderRadius: BorderRadius.circular(20),
      ),
      child: Row(
        children: [
          Image.asset(imagePath, width: 72, height: 72),
          const SizedBox(width: 16),
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  name,
                  style: const TextStyle(
                    color: Colors.white,
                    fontSize: 18,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 4),
                Text(
                  description,
                  style: const TextStyle(color: Colors.white70, fontSize: 12),
                ),
                const SizedBox(height: 8),
                ElevatedButton(
                  onPressed: onPressed,
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFFF59E0B),
                    foregroundColor: const Color(0xFF110E33),
                  ),
                  child: Text('Buka $price koin'),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
