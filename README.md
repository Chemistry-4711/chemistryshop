## Chemistry Shop
### CHANGELOG

##### Release 2.0
- made production, receiving, and sales page go live
- administrator page to handle maintenance for all production, receiving, and sales
- added xml log files to track sales, receiving, and production
- summary page reads log files to get data for sales
- user roles added to authorize users to some pages
- uses backend site to handle supplies
- uses own database frontend to handle stock, cost, and recipes
- updated models to use database for data, added ci_sessions; updated controllers to work with the data thats being fetched from db - inqr
- updated styles for navbar - MK
- added communication to backend and updated the controllers to complement the changes - MK
- updated the production controller to be able to create recipes and updated the inventory model to be able to make POST, PUT, DELETE requests - MK


##### Release 1.0
- added template for views KL
- added Inventory model - MK
- added Recipes model with fake data and a get method JH
- added Stock model - BC
- fixed nav bar titles - KL
- added Homepage controller and remove Welcome controller (updated routes.php accordingly)
- added Sales controller - inqr
- updated receiving controller to create welcome_message(temporary until views created) - JH
- Created 2 views which displays a list of inventory items and their receipts for each item - JH
- added production controller and recipe views - KL
- fixed nav bar to link properly - KL
- fixed link to homepage - KL
- added sales_order and sales_menu views. also updates Sales controller to match - inqr
- added more details to the recipes single view" - KL
- added bootstrap to template and styled the following views: inventoryList, inventoryReceipt, recipes_list, sales_menu, template - MK
- added summary of data to homepage, refactored Stock model - KL
- added quantity box in sales and included a thank you message - BC
- updated exsisting files for better cosistency; added more styling to pages, revamped all the single-item pages and fixed error where bootstrap wasn't linked to pages properly; - MK

