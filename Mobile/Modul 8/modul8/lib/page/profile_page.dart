import 'package:flutter/material.dart';
import 'package:flutter_svg/flutter_svg.dart';

class ProfilePage extends StatefulWidget {
  final VoidCallback onOpenReward;

  const ProfilePage({super.key, required this.onOpenReward});

  @override
  State<ProfilePage> createState() => _ProfilePageState();
}

class _ProfilePageState extends State<ProfilePage> {
  bool isDarkMode = true;

  @override
  Widget build(BuildContext context) {
    return CustomScrollView(
      physics: const ClampingScrollPhysics(),
      slivers: [
        SliverPadding(
          padding: const EdgeInsets.fromLTRB(20, 20, 20, 24),
          sliver: SliverList(
            delegate: SliverChildListDelegate([
              const SizedBox(height: 12),
              const Center(
                child: Text(
                  'Profile',
                  style: TextStyle(
                    color: Colors.white,
                    fontSize: 20,
                    fontWeight: FontWeight.bold,
                  ),
                ),
              ),
              const SizedBox(height: 36),
              _buildAvatarSection(),
              const SizedBox(height: 24),
              _buildStatsCards(),
              const SizedBox(height: 15),
              _buildThemeMenu(),
              const SizedBox(height: 15),
              _buildRewardsCard(),
              const SizedBox(height: 32),
              _buildBadgesSection(),
              const SizedBox(height: 20),
            ]),
          ),
        ),
      ],
    );
  }

  Widget _buildAvatarSection() {
    return Column(
      children: [
        Container(
          width: 140,
          height: 140,
          decoration: BoxDecoration(
            shape: BoxShape.circle,
            border: Border.all(color: const Color(0xFFFFB020), width: 5),
          ),
          child: ClipOval(
            child: Image.asset(
              'assets/image/profil3.png',
              fit: BoxFit.cover,
              errorBuilder: (_, __, ___) {
                return Container(
                  color: const Color(0xFF3D3F73),
                  child: const Center(
                    child: Icon(Icons.person, color: Color(0xFF6E70A8), size: 60),
                  ),
                );
              },
            ),
          ),
        ),
        const SizedBox(height: 4),
        const Text(
          'John Doe',
          style: TextStyle(
            color: Colors.white,
            fontSize: 26,
            fontWeight: FontWeight.bold,
          ),
        ),
        const SizedBox(height: 1),
        const Text(
          '@DoeMusic',
          style: TextStyle(
            color: Colors.white,
            fontSize: 16,
            fontWeight: FontWeight.w100,
          ),
        ),
      ],
    );
  }

  Widget _buildStatsCards() {
    return const Row(
      children: [
        Expanded(child: _StatCard(value: '67', label: 'Kuis\nDiselesaikan')),
        SizedBox(width: 12),
        Expanded(child: _StatCard(value: '84%', label: 'Jawaban\nBenar')),
        SizedBox(width: 12),
        Expanded(child: _StatCard(value: '6', label: 'Lencana\nDidapatkan')),
      ],
    );
  }

  Widget _buildThemeMenu() {
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 4),
      decoration: BoxDecoration(
        color: const Color(0xff1d1a3d),
        borderRadius: BorderRadius.circular(32),
        border: Border.all(color: Colors.white.withAlpha(13), width: 1),
      ),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          Row(
            children: [
              Container(
                width: 34,
                height: 34,
                decoration: BoxDecoration(
                  color: Colors.white.withAlpha(10),
                  borderRadius: BorderRadius.circular(10),
                ),
                child: Icon(
                  isDarkMode ? Icons.nightlight_round : Icons.wb_sunny,
                  color: const Color(0xFFFFB020),
                  size: 20,
                ),
              ),
              const SizedBox(width: 12),
              Text(
                isDarkMode ? 'Dark Mode' : 'Light Mode',
                style: const TextStyle(
                  color: Colors.white,
                  fontSize: 16,
                  fontWeight: FontWeight.w600,
                ),
              ),
            ],
          ),
          Switch(
            value: !isDarkMode,
            onChanged: (value) {
              setState(() {
                isDarkMode = !value;
              });
            },
            activeColor: const Color(0xFFFFB020),
          ),
        ],
      ),
    );
  }

  Widget _buildRewardsCard() {
    return Material(
      color: Colors.transparent,
      child: InkWell(
        onTap: widget.onOpenReward,
        borderRadius: BorderRadius.circular(20),
        child: Container(
          padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 17),
          decoration: BoxDecoration(
            gradient: const LinearGradient(
              begin: Alignment.topLeft,
              end: Alignment.bottomRight,
              colors: [Color(0xFF241D66), Color(0xFF141040)],
              stops: [0.03, 1.0],
            ),
            borderRadius: BorderRadius.circular(32),
            border: Border.all(color: const Color(0x1AFFFFFF), width: 1),
          ),
          child: Row(
            children: [
              SizedBox(
                width: 34,
                height: 34,
                child: SvgPicture.asset(
                  'assets/icon/piala.svg',
                  fit: BoxFit.contain,
                  placeholderBuilder: (_) => const Icon(
                    Icons.emoji_events,
                    color: Color(0xFFFFB020),
                  ),
                ),
              ),
              const SizedBox(width: 16),
              const Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      'Hadiah & Misi',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 18,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    SizedBox(height: 4),
                    Text(
                      'Cek progressmu dan klaim hadiah',
                      style: TextStyle(
                        color: Colors.white,
                        fontSize: 14,
                        fontWeight: FontWeight.w300,
                      ),
                    ),
                  ],
                ),
              ),
              const Icon(Icons.chevron_right, color: Colors.white, size: 28),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildBadgesSection() {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        const Text(
          'Lencana',
          style: TextStyle(
            color: Colors.white,
            fontSize: 20,
            fontWeight: FontWeight.bold,
          ),
        ),
        const SizedBox(height: 16),
        GridView.count(
          crossAxisCount: 3,
          shrinkWrap: true,
          physics: const NeverScrollableScrollPhysics(),
          mainAxisSpacing: 20,
          crossAxisSpacing: 16,
          childAspectRatio: 0.85,
          children: const [
            _BadgeItem(stars: 1, label: 'Buat Akun', fontSize: 14),
            _BadgeItem(stars: 3, label: 'Suling Virtuoso', fontSize: 14),
            _BadgeItem(stars: 3, label: 'Angklung Pro', fontSize: 14),
            _BadgeItem(stars: 2, label: 'Pemula', fontSize: 14),
            _BadgeItem(stars: 3, label: 'Kolektor', fontSize: 14),
            _BadgeItem(stars: 3, label: 'Skor 100%', fontSize: 14),
          ],
        ),
      ],
    );
  }
}

class _StatCard extends StatelessWidget {
  final String value;
  final String label;

  const _StatCard({required this.value, required this.label});

  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.symmetric(vertical: 16, horizontal: 10),
      decoration: BoxDecoration(
        color: const Color(0xff1d1a3d),
        borderRadius: BorderRadius.circular(32),
      ),
      child: Column(
        children: [
          Text(
            value,
            style: const TextStyle(
              color: Color(0xFFFFB020),
              fontSize: 30,
              fontWeight: FontWeight.bold,
              height: 1,
            ),
          ),
          const SizedBox(height: 8),
          Text(
            label,
            textAlign: TextAlign.center,
            style: const TextStyle(
              color: Colors.white,
              fontSize: 14,
              fontWeight: FontWeight.w500,
              height: 1.3,
            ),
          ),
        ],
      ),
    );
  }
}

class _BadgeItem extends StatelessWidget {
  final int stars;
  final String label;
  final double fontSize;

  const _BadgeItem({
    required this.stars,
    required this.label,
    required this.fontSize,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      mainAxisSize: MainAxisSize.min,
      children: [
        Container(
          width: 100,
          height: 100,
          decoration: BoxDecoration(
            color: Colors.white,
            shape: BoxShape.circle,
            border: Border.all(color: const Color(0xFFFFB020), width: 3),
          ),
          child: Center(
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              mainAxisSize: MainAxisSize.min,
              children: List.generate(
                stars,
                (_) => const Icon(Icons.star, color: Color(0xFFFFB020), size: 20),
              ),
            ),
          ),
        ),
        const SizedBox(height: 8),
        Text(
          label,
          textAlign: TextAlign.center,
          style: TextStyle(
            color: Colors.white,
            fontSize: fontSize,
            fontWeight: FontWeight.w500,
            height: 1.2,
          ),
          maxLines: 2,
          overflow: TextOverflow.ellipsis,
        ),
      ],
    );
  }
}
