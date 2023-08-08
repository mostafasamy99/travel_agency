# travel_agency

There are six APIs:
1. A private (admin) endpoint to create new users.
![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/120c06fd-1c0a-4180-908e-bcb890d67ace)


2. A private (admin) endpoint to create new travels;
   ![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/e42bbee5-9f00-4060-a93e-8c17c23a2355)

3. A private (admin) endpoint to create new tours for a travel;
   ![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/3fc1556c-bb2d-4eb8-82df-9f327c384d2f)

4. A private (editor) endpoint to update a travel;
   ![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/76dc8ae9-5fb0-4659-ad7d-dbf6d8753892)

5. A public (no auth) endpoint to get a list of paginated travels. It must return only public travels;
   ![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/d07cf18a-fc46-43bb-9226-bf1bd9519bee)

6. A public (no auth) endpoint to get a list of paginated tours by the travel slug (e.g. all the tours of the travel foo-bar). Users can filter (search) the results by priceFrom, priceTo, dateFrom (from that startingDate) and dateTo (until that startingDate). Users can sort the list by price asc and desc. They will always be sorted, after every additional user-provided filter, by startingDate asc.
   ![image](https://github.com/mostafasamy99/travel_agency/assets/54373320/2534e673-2991-4ed3-a17a-667057cd08b0)
