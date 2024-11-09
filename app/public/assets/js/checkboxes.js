function checkAll(o) {
    const boxes = document.getElementsByTagName("input");
    for (var i = 0; i < boxes.length; i++) {
      var obj = boxes[i];
      if (obj.type == "checkbox") {
        if (obj.name != "check")
          obj.checked = o.checked;
      }
    }
  }