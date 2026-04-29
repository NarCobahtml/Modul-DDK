import 'package:animated_bottom_navigation_bar/animated_bottom_navigation_bar.dart';
import 'package:flutter/material.dart';
import 'package:get/get.dart';

import 'dashboard_page.dart';
import 'leaderboard_page.dart';
import 'mode_page.dart';
import 'profile_page.dart';
import 'reward_page.dart';

class HomeController extends GetxController {
  final currentIndex = 0.obs;

  void changePage(int index) {
    currentIndex.value = index;
  }

  void openModePage() {
    currentIndex.value = 1;
  }

  void openRewardPage() {
    currentIndex.value = 3;
  }
}

class HomePage extends GetView<HomeController> {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    final pages = [
      DashboardPage(onNavigateToMode: controller.openModePage),
      const ModePage(),
      const LeaderboardPage(),
      RewardPage(onOpenLeaderboard: () => controller.changePage(2)),
      ProfilePage(onOpenReward: controller.openRewardPage),
    ];
    final footerIcons = [
      'assets/image/icon_footer1.png',
      'assets/image/icon_footer3.png',
      'assets/image/icon_footer2.png',
      'assets/image/icon_footer4.png',
      'assets/image/icon_footer5.png',
    ];
    final navLabels = ['Beranda', 'Mode', 'Papan Skor', 'Hadiah', 'Profil'];

    return Scaffold(
      body: Obx(() => SafeArea(child: pages[controller.currentIndex.value])),
      bottomNavigationBar: Obx(
        () => AnimatedBottomNavigationBar.builder(
          itemCount: footerIcons.length,
          activeIndex: controller.currentIndex.value,
          gapLocation: GapLocation.none,
          notchSmoothness: NotchSmoothness.softEdge,
          leftCornerRadius: 20,
          rightCornerRadius: 20,
          backgroundColor: const Color(0xff0d0a27),
          splashColor: Colors.transparent,
          splashRadius: 0,
          tabBuilder: (index, isActive) {
            final color = isActive ? const Color(0xFFF59E0B) : Colors.white;
            return Column(
              mainAxisAlignment: MainAxisAlignment.center,
              mainAxisSize: MainAxisSize.min,
              children: [
                Image.asset(
                  footerIcons[index],
                  color: color,
                  width: 24,
                  height: 24,
                ),
                const SizedBox(height: 4),
                Text(
                  navLabels[index],
                  style: TextStyle(
                    color: color,
                    fontSize: 10,
                    fontWeight: isActive ? FontWeight.bold : FontWeight.normal,
                  ),
                ),
              ],
            );
          },
          onTap: controller.changePage,
        ),
      ),
    );
  }
}
