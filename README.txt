Infograph - by Team Ego

Project Description and Behavior:
Infograph shows a graph of an association of keywords. 
When a user enters a keyword, Infograph will show keywords associated with a keyword as its children nodes.
When a user clicks on one of the child nodes, the child node will become the parent node and Infograph will show new children nodes related to the new keyword.
When a user hovers over the child node, Infograph will show 5 articles that are associated with the keyword.
When a user clicks on the article, the article will be displayed in a fullscreen view.

External Plugins used:
CodeIgniter PHP Framework
Simplepie RSS parser
AlchemyAPI Language Analysis Tool
jQuery

Project Starting Point:
We are using some codes from our existing project that we have worked on for some time.
So far, the code contains RSS fetching algorithms that utilizes Simplepie RSS parser, and contains a model that stores the articles fetched to the database.
Because we have been saving articles using RSS feeds for a month, we have a database full of 20000+ articles.

Things to accomplish:

1. Build keyword extraction tools using AlchemyAPI that determines the topic of these articles, and integrate the algorithm with our feed fetching system so that the keyword will be determined as we fetch them using RSS.
2. Create an algorithm that calculates the association among keywords.
3. Create a UI that shows a graph of the association among keywords.

Note:
Please test on Chrome & Safari.
This application