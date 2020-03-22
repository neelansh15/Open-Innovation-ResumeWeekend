# Open Innovation: ResumeWeekend

### Not just a portfolio builder, but a complete integration with your Github workflow.

## The problem Résumé Weekend solves
Often developers choose to build a portfolio for their work, and that portfolio or online résumé is separate from their programming workflow and especially separate from their Github. We aim to provide an environment where the Portfolio, the Github, and a Cloud IDE for coding, are all in one place

## Challenges we ran into
About the bugs, there were several CORS-related issues during the calls to the API. We spent a total of 4-5 hours just fixing CORS issues! It is crazy but that happened because we were using the VueJS app and PHP API on the same domain but a different port. Numerous other issues were there but there is nothing that a little StackOverflow can't solve :)

Another challenge was to manage the database flow for our custom portfolio-hosting and the user's Github account plus an optional Codiad Cloud IDE we were planning to implement but ran out of time.

Adding to it, I would say that a big challenge was going on with the project alone. My teammate had to back out due to unforeseen circumstances, and carrying on the grind alone was not an easy task :)

## Tech Stack
The project uses **VueJS** as the front-end framework and **PHP** for the back-end API. **MySQL** is the database of choice.

## Running the project
VueJS resides in the `app/` directory. You would have to manually change the API URLs in a lot of places. To avoid that, host your **PHP** application from the `api/` directory to the URL: `http://localhost:80/resumeweekend` (which is currently configured for the API calls)

_You can find dedicated information about hosting both the VueJS app and the PHP API in their respective folder's READMEs_
___VueJS__: `app/`  
__PHP__: `api/`_
