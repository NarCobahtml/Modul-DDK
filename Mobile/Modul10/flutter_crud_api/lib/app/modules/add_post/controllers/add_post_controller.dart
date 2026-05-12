import 'package:get/get.dart';
import 'package:flutter/material.dart';
import 'package:flutter_crud_api/app/data/post_model.dart';
import 'package:flutter_crud_api/app/services/post_api.dart';
import 'package:flutter_crud_api/app/routes/app_pages.dart';

class AddPostController extends GetxController {
  PostModel? postModel;
  RxBool isLoading = false.obs;
  RxBool isLoadingCreateTodo = false.obs;
  TextEditingController titleC = TextEditingController();
  TextEditingController contentC = TextEditingController();
  @override
  onClose() {
    titleC.dispose();
    contentC.dispose();
  }

  Future addPost() async {
    update();
    postModel = await PostApi().addPostAPI(titleC.text, contentC.text);
    if (postModel!.status == 200) {
      update();
      Get.offAndToNamed(Routes.HOME);
    } else if (postModel!.status == 404) {
      update();
    }
  }
}
