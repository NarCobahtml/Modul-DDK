import 'package:modul_4/models/item.dart';
import 'package:modul_4/widgets/item_card.dart';
import 'package:flutter/material.dart';

class HomePage extends StatelessWidget {
  HomePage({super.key});

  final List<Item> items = [
    Item(name: 'Sugar', price: 5000, icon: Icons.cookie),
    Item(name: 'Salt', price: 2000, icon: Icons.water_drop),
    Item(name: 'Milk', price: 8000, icon: Icons.local_drink),
    Item(name: 'Egg', price: 3000, icon: Icons.egg),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.grey.shade100,
      appBar: AppBar(
        backgroundColor: Colors.teal,
        title: const Text(
          'Tumbas Jajan',
          style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold),
        ),
      ),
      body: ListView.builder(
        padding: const EdgeInsets.all(12),
        itemCount: items.length,
        itemBuilder: (context, index) {
          final item = items[index];
          return Padding(
            padding: const EdgeInsets.only(bottom: 8),
            child: ItemCard(
              item: item,
              onTap: () {
                Navigator.pushNamed(context, '/item', arguments: item);
              },
            ),
          );
        },
      ),
    );
  }
}
