var selections = [
    {
      name: "link",
      buttons: ["linkEdit"],
      test: AlloyEditor.SelectionTest.link
    },
    {
      name: "text",
      buttons: [
        "styles",
        "bold",
        "italic",
        "underline",
        "ul",
        "ol",
        "link",
        "twitter"
      ],
      test: AlloyEditor.SelectionTest.text
    },
    {
      name: "table",
      buttons: ["tableRow", "tableColumn", "tableCell", "tableRemove"],
      getArrowBoxClasses: AlloyEditor.SelectionGetArrowBoxClasses.table,
      setPosition: AlloyEditor.SelectionSetPosition.table,
      test: AlloyEditor.SelectionTest.table
    }
  ];
  
  AlloyEditor.editable("section", {
    toolbars: {
      styles: {
        selections: selections,
        tabIndex: 1
      }
    }
  });