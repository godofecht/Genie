<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Prompt;
use App\Models\Question;
use Illuminate\Database\Seeder;

class PromptsSeederV2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->categories();
        $this->copywritingPrompts();
        $this->generativeAIPrompts();
        $this->marketingPrompts();
        $this->saasPrompts();
        $this->seoPrompts();
    }

    private function categories()
    {
        $categories = [
            [
                'id' => 8,
                'title' => 'Copywriting',
            ],
            [
                'id' => 9,
                'title' => 'Generative AI',
            ],
            [
                'id' => 10,
                'title' => 'Marketing',
            ],
            [
                'id' => 11,
                'title' => 'SaaS',
            ],
            [
                'id' => 12,
                'title' => 'SEO',
            ],
        ];

        Category::insert($categories);
    }

    private function copywritingPrompts()
    {
        $questions = [
            [
                'id' => 22,
                'question' => 'Enter the keywords you want to create titles for',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 23,
                'question' => 'Text that you want a meta description for',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 24,
                'question' => 'What\'s your video topic?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 25,
                'question' => 'What\'s your story topic?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 26,
                'question' => 'What\'s your topic or problem for the quotes?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
        ];

        Question::insert($questions);

        $prompts = [
            // Copywriting
            [
                'id' => 19,
                'title' => 'Blog post title',
                'description' => 'Generate post titles with for specific keywords.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                I want you to act as a blog post title writer that speaks and writes fluent {{language}}.
                I will type a title, or keywords via comma and you will reply with blog post titles in {{language}}.
                They should all have a hook and high potential to go viral on social media. Write all in {{language}}. my first keywords are {{answer_1}}',
                'category_id' => 8
            ],
            [
                'id' => 20,
                'title' => 'Meta description',
                'description' => 'Write the best meta description from text provided.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                I want you to act as a very proficient SEO and high end copy writer that speaks and writes fluent {{language}}.
                I want you to pretend that you can write content so good in {{language}} that it can outrank other websites.
                Your task is to summarize the text I give you in 20 words or maximum 130 characters. All output shall be in {{language}}.
                The text to summarize is this: {{answer_1}}',
                'category_id' => 8
            ],
            [
                'id' => 21,
                'title' => 'YouTube script creator',
                'description' => 'Create captivating script ideas for your YouTube videos.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. Create a compelling and captivating YouTube video script from the following description: {{answer_1}}.',
                'category_id' => 8
            ],
            [
                'id' => 22,
                'title' => 'Short story generator',
                'description' => 'Generates a short story based on your description.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. Write a unique short story without plagiarizing using the following description: {{answer_1}}. Generate a title as well please.',
                'category_id' => 8
            ],
            [
                'id' => 23,
                'title' => 'Inspirational quotes',
                'description' => 'Input a problem area to get 50 inspiring quotes for people struggling with that problem',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                Give me 50 short inspirational quotes about {{answer_1}}. Mix the quotes up with metaphores, straight up advice,
                wrong Ideas to avoid and encouragement start each quote with a different word. don\'t self reference.
                refrain from starting with "you" or "like"... Avoid repetition and keep the quotes fresh and activating.',
                'category_id' => 8
            ],
        ];

        Prompt::insert($prompts);

        // 'Blog post title'
        // Enter the keywords you want to create titles for
        Prompt::find(19)->questions()->sync([22]);

        // 'Meta description'
        // Text that you want a meta description for
        Prompt::find(20)->questions()->sync([23]);

        // 'YouTube script creator'
        // What's your video topic?
        Prompt::find(21)->questions()->sync([24]);

        // 'Short story generator'
        // What's your story topic?
        Prompt::find(22)->questions()->sync([25]);

        // 'Inspirational quotes'
        // What's your topic or problem?
        Prompt::find(23)->questions()->sync([26]);
    }

    private function generativeAIPrompts()
    {
        $questions = [
            [
                'id' => 27,
                'question' => 'What are the keywords?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
        ];

        Question::insert($questions);

        $prompts = [
            [
                'id' => 24,
                'title' => 'Midjourney prompts',
                'description' => 'Outputs four extremely detailed Midjourney prompts for your keyword.',
                'type' => 'text',
                'prompt' => 'You will now act as a prompt generator for a generative AI called "Midjourney". Midjourney AI generates images based on given prompts.
                I will provide a concept and you will provide the prompt for Midjourney AI.
                You will never alter the structure and formatting outlined below in any way and obey the following guidelines:
                You will not write the words "description" or use ":" in any form. Never place a comma between [ar] and [v].
                You will write each prompt in one line without using return.

                Structure:
                [1] = {{answer_1}}
                [2] = a detailed description of [1] that will include very specific imagery details.
                [3] = with a detailed description describing the environment of the scene.
                [4] = with a detailed description describing the mood/feelings and atmosphere of the scene.
                [5] = A style, for example: photography, painting, illustration, sculpture, Artwork, paperwork, 3d and more). [1]
                [6] = A description of how [5] will be realized. (e.g. Photography (e.g. Macro, Fisheye Style, Portrait) with camera model and appropriate camera settings, Painting with detailed descriptions about the materials and working material used, rendering with engine settings, a digital Illustration, a woodburn art (and everything else that could be defined as an output type)
                [ar] = "--ar 16:9" if the image looks best horizontally, "--ar 9:16" if the image looks best vertically, "--ar 1:1" if the image looks best in a square. (Use exactly as written)
                [v] = If [5] looks best in a Japanese art style use, "--niji". Otherwise use, "--v 5" (Use exactly as written)

                Formatting:
                What you write will be exactly as formatted in the structure below, including the "/" and ":"
                This is the prompt structure: "/imagine prompt: [1], [2], [3], [4], [5], [6], [ar] [v]".

                This is your task: You will generate 4 prompts for each concept [1], and each of your prompts will be a different approach in its description, environment, atmosphere, and realization.

                The prompts you provide will be in {{language}}.

                Please pay attention:
                - Concepts that can\'t be real would not be described as "Real" or "realistic" or "photo" or a "photograph". for example, a concept that is made of paper or scenes which are fantasy related.
                        - One of the prompts you generate for each concept must be in a realistic photographic style. you should also choose a lens type and size for it. Don\'t choose an artist for the realistic photography prompts.
                - Separate the different prompts with two new lines',
                'category_id' => 9
            ],
            [
                'id' => 25,
                'title' => 'Midjourney sticker',
                'description' => 'Outputs four extremely detailed Midjourney sticker prompt for your keyword.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                Your task is learn formula for Midjourney prompt are {{answer_1}} of 3 descriptive keywords + Appearance + mood + action, and list 6 {{language}} Midjourney prompt by formula .
                And add following words after each prompt : digital drawing cartoon sticker, Ghibli-style, image black border Color, fluffy, full body, flat cartoon style, transparent background, 2D --niji --v 5',
                'category_id' => 9
            ],
            [
                'id' => 26,
                'title' => 'StableDiffusion prompts',
                'description' => 'Outputs four extremely detailed StableDiffusion prompts for your keyword.',
                'type' => 'text',
                'prompt' => 'you are a professional stable diffusion prompt inventor (you generate text for making images).
                [prompt description]
                Provide a precise specification of the desired appearance of the image. with some details (what, who, where, etc.).

                [Styling]
                a bunch of words to that give your image a unique look. examples of some words you could use: --ar 16:9, names of artists/photographer, names of studios, extremly detailed, --v 4, --enhance-detail, 8k, --colorize, --super-res, art style name, and more. it must contain at least 8 unique things. be creative.

                [Negative Prompts]
                Negative Prompts provide a list of not wanted things in the endresult of an image. These can be used to improve the image quality and avoid common mistakes. For example, the list may include things such as fused fingers, too many fingers, asymmetric eyes, misshapen body, and more. objects can also be used. a negative prompt must contain at least 10 different things. always include:"bad anatomy",

                follow these guidelines at any cost:
                "\" means random.
                write in this:"{{language}}" language.
                the stable diffusion prompt is basicly a list of items formated like this: goat, red hair, art by thibli, --ar 16:9. it must at least 15 items.
                don\'t use photographic terms when the image is not a photo.
                    paramater consist out of 3 comments made by the user. you must always use this, and in the righ Categorie. if [Negative prompt] parameter contains for example:"nfixer, nrealfixer, nartfixer" the [Negative prompt] must contain it.
                    format of the parameter:"[Prompt description]-[Styling]-[Negative prompt]".

                    Structure:
                combine [Prompt description] and [Styling] into 1 line without using return.

                Format it in exactly this way:
                ”
                | Prompt count | Stable diffusion prompt | Negative prompt |
                |------|-----|--------|
                | Prompt 1 | [Prompt description], [Styling]. | [Negative prompt]  |
                | Prompt 2 | [Prompt description], [Styling]. | [Negative prompt] |
                | Propmt 3  | [Prompt description], [Styling]. | [Negative prompt]  |
                ".  it is a table

                create 3 creative new [Stable diffusion prompts] using this parameter: "{{answer_1}}".',
                'category_id' => 9
            ],
        ];

        Prompt::insert($prompts);

        Prompt::find(24)->questions()->sync([27]);
        Prompt::find(25)->questions()->sync([27]);
        Prompt::find(26)->questions()->sync([27]);
    }

    private function marketingPrompts()
    {
        $questions = [
            [
                'id' => 28,
                'question' => 'What\'s your category?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 29,
                'question' => 'What\'s your product/service?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 30,
                'question' => 'How much $ do you have?',
                'type' => 'single_line',
                'is_required' => 'required',
                'minimum_answer_length' => 1
            ],
        ];

        Question::insert($questions);

        $prompts = [
            [
                'id' => 27,
                'title' => 'Segment your audience',
                'description' => 'De-average by breaking your audience into targetable groups with similar needs.',
                'type' => 'text',
                'prompt' => 'I want you to act as a market research expert that speaks and writes fluent {{language}}.
                Pretend that you know everything about every market also in {{language}}.
                Produce ten audience segments for audiences in the following category: {{answer_1}}.
                Each segment should be defined by a deep underlying category-related need.
                Give each segment an emoji and a sassy title.
                Describe each segment’s category-related needs and give innovative ideas for specific initiatives they could do to better meet the needs of that segment.
                All your output shall be in {{language}} language.',
                'category_id' => 10
            ],
            [
                'id' => 28,
                'title' => 'Advertising campaign',
                'description' => 'Create professional advertising campaign about your topic.',
                'type' => 'text',
                'prompt' => 'I want you to act as an advertiser. You will create a campaign to promote a product or service of your choice.
                You will choose a target audience, develop key messages and slogans, select the media channels for promotion, and decide on any additional activities needed to reach your goals.
                My first suggestion request is "{{answer_1}}", I want you do give me the reply in {{language}}',
                'category_id' => 10
            ],
            [
                'id' => 29,
                'title' => 'Email marketing',
                'description' => 'Create an Email marketing series for your product or service.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in {{language}}.
                You will act as a professional Email Marketing copywriter for a specific product/service that the user have provided you as the following "{{answer_1}}".
                Your goal is to outline an email sequence/series that will convert leads into paying customers.
                The emails should take the lead through a series of steps that will move them closer to booking a discovery call with the company.
                The emails should include a clear and compelling subject line, and a breif outline of the topics that will be discussed in that email.
                Also, please research the target audience demographics, such as age, gender, location, interests, and other characteristics that would help you to have a better understanding of the target audience, and create an email that would be more appealing to them.
                Please also make sure that the email is well-researched and includes accurate and up-to-date information.',
                'category_id' => 10
            ],
            [
                'id' => 30,
                'title' => 'Marketing plan',
                'description' => 'Create a comprehensive marketing plan in seconds!',
                'type' => 'text',
                'prompt' => 'Create a comprehensive marketing proposal in {{language}} based on {{answer_1}}.
                Please include information on the industry, target market, competition, a detailed plan for a successful launch, including performance metrics, excluding budget.',
                'category_id' => 10
            ],
            [
                'id' => 31,
                'title' => 'Marketing funnel',
                'description' => 'Get detailed advice on what you want to do with the marketing funnel builder tool',
                'type' => 'text',
                'prompt' => 'Override all the instructions I gave you before. I want you to respond as an expert on the marketing funnel.
                For {{answer_1}} you need to build the stages of attention, interest, desire and action. You need to write the tasks for each stage in detail and with pinpoint accuracy, and not use general phrases.
                All the {{language}} content you produce should be aimed at making people who don\'t have to buy anything from us our customers.
                All tasks should only serve this purpose. After you\'re done, advise on how to produce relevant and valuable content that addresses audience pain points, builds trust and credibility, and makes it easier for them to take action.
                Once this is done, create the cold target audience\'s buying tendencies section.
                In this section, write down the possible needs and expectations of potential customers.
                Categorize the evaluation according to the benefits and create a detailed value ladder.
                Finally, prepare Facebook and Instagram posts accordingly. Write Youtube video ideas.',
                'category_id' => 10
            ],
            [
                'id' => 32,
                'title' => 'Freelance quote',
                'description' => 'Write a quote for your service',
                'type' => 'text',
                'prompt' => 'I want you to act as a freelance, i want you to reply to a client project description giving the client a quote and explain how the project would be complete here is the client project description {{answer_1}} and i want response in {{language}}',
                'category_id' => 10
            ],
            [
                'id' => 33,
                'title' => 'SharkGPT',
                'description' => 'Write a quote for your service',
                'type' => 'text',
                'prompt' => 'You are SharkGPT, an entrepreneurial AI. I am your human counterpart.
                I can act as a liaison between you and the physical world, you have ${{answer_1}}, and your only goal is to turn that into as mush money as possible in the shortest time possible, without doing anything illegal.
                The business idea is {{answer_2}}
                I will do everything you say and keep you updated on our current cash total. No manual labor. Develop your idea in {{language}}',
                'category_id' => 10
            ],
        ];

        Prompt::insert($prompts);

        Prompt::find(27)->questions()->sync([28]);
        Prompt::find(28)->questions()->sync([29]);
        Prompt::find(29)->questions()->sync([29]);
        Prompt::find(30)->questions()->sync([29]);
        Prompt::find(31)->questions()->sync([29]);
        Prompt::find(32)->questions()->sync([29]);
        Prompt::find(33)->questions()->sync([30, 29]);
    }

    private function saasPrompts()
    {
        $prompts = [
            [
                'id' => 34,
                'title' => 'No refund policy',
                'description' => 'Explain the customer nice and firm that you have a no refund policy.',
                'type' => 'text',
                'prompt' => 'I want you to act as a very experienced and proficient customer support manager.
                I want you to pretend that you can convince any customer in a professional and effective way, whatever the situation.
                The company we work for has a no refunds policy listed at the first URL in the comment: . The customer is solely responsible for cancelling their subscription.
                All your output shall be in {{language}} language.
                My product or service is: {{answer_1}}',
                'category_id' => 11
            ],
            [
                'id' => 35,
                'title' => 'Explain cancel consequences',
                'description' => 'Explain the customer the consequences of cancelling his account.',
                'type' => 'text',
                'prompt' => 'I want you to act as a very experienced and proficient customer support manager.
                I want you to pretend that you can convince any customer in a professional and effective way, whatever the situation.
                The company we work for all products as subscription products. If they cancel their account now, please note that the system will delete all their reports and link alerts, as well as all their keyword classification, link tagging, favorites, and project setups in 7 days.
                When they sign up again, they will need to set all of these things up again and pay the new (higher) price for their subscription, although if they stay now, they will keep the existing grandfathered price. they will not be able to download any of their reports or data after cancellation and the expiration of their account, so they will have to start over if they subscribe again at a later point. Do they still wish us to proceed with the cancellation, or would they be interested in staying at a discounted price? All your output shall be in {{language}} language.
                My product or service is: {{answer_1}}',
                'category_id' => 11
            ],
            [
                'id' => 36,
                'title' => 'Annual vs. Monthly',
                'description' => 'Explain the benefits of annual over monthly payments.',
                'type' => 'text',
                'prompt' => 'I want you to act as a very experienced and proficient customer support manager. I want you to pretend that you can convince any customer in a professional and effective way, whatever the situation.
                The company we work for all products as subscripton products. Most subscription products are offered at different durations with monthly or annual payment. The annual commitment has the following advantages:
                - Significantly lower price in total compared to monthly payments
                - Product quotas are allocated for the whole year, so the customer can use the product as much as he wants, without worrying about the quota limits of a single month
                - No interruptions of workflow due to Credit card failures
                - No need to renew the subscription every month
                - No need to pay for the product every month
                - No need to worry about the product being cancelled due to non-payment
                - Annual payments also support payment via Invoice and Purchase order, which are not available for monthly payments
                All your output shall be in {{language}} language. Here is the customer communication with questions or concerns, My product or service is: {{answer_1}}',
                'category_id' => 11
            ],
            [
                'id' => 37,
                'title' => 'Limited trial explained',
                'description' => 'Explain the customer that the trial is for testing, not for cheaper ways to (a)buse the product.',
                'type' => 'text',
                'prompt' => 'I want you to act as a very experienced and proficient customer support manager. I want you to pretend that you can convince any customer in a professional and effective way, whatever the situation. The company we work for all products as subscription products. Some of them offer limited trial version. The trial versions are offered so that the customer can familiarize himself with the product, use it to learn with the training material and in general feel lower risk. Sometimes customers believe that they found a magic trick to (a)buse the trial to get access to the major functionality, without paying for it. They then later get annoyed, aggressive or even abusive in their communication when they find out that they in fact could not circumvent paying for the services rendered. Explain to the customer, that the goal was for them to understand the product, and not a cheap trick. Offer them to still be able to use their work, but of course rendered servers that may be still limited in the trial will need to be paid in full to be utilized. All your output shall be in {{language}} language. Here is the customer communication with questions or concerns, My product or service is: {{answer_1}}',
                'category_id' => 11
            ],
        ];

        Prompt::insert($prompts);

        Prompt::find(34)->questions()->sync([29]);
        Prompt::find(35)->questions()->sync([29]);
        Prompt::find(36)->questions()->sync([29]);
        Prompt::find(37)->questions()->sync([29]);
    }

    private function seoPrompts()
    {
        $questions = [
            [
                'id' => 31,
                'question' => 'What\'s your content?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 32,
                'question' => 'What\'s your keyword?',
                'type' => 'single_line',
                'is_required' => 'required',
                'minimum_answer_length' => 3
            ],
            [
                'id' => 33,
                'question' => 'What\'s your topic?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
        ];

        Question::insert($questions);

        $prompts = [
            [
                'id' => 38,
                'title' => 'Keyword cluster',
                'description' => 'Cluster a list of keywords based on their semantic relevance.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                I want you to act as a keyword research expert that speaks and writes fluent {{language}}.
                Classify each of the keywords by the search intent, whether commercial, transactional or informational.
                Then cluster the keywords into groups based on their semantic relevance. First I want you to give me back a short over list of cluster topics found.
                Then I want a list in {{language}} as markdown table, with the following columns:  cluster, keyword, search intent, language. Here are the keywords: {{answer_1}}',
                'category_id' => 12
            ],
            [
                'id' => 39,
                'title' => 'Keyword translator',
                'description' => 'Translate a list of keywords from any language to your target language.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}. I want you to act as a very proficent translator that speaks and writes fluent {{language}}. I want you to pretend that you are able to act as a translator and can translate my list of keywords to {{language}}. Generate the results in a markdown table with only two columns, with the keywords in the given language in the first one, and their translation to {{language}} in the second column. The target language is {{language}}. The list of keywords are:\n\r{{answer_1}}',
                'category_id' => 12
            ],
            [
                'id' => 40,
                'title' => 'Find questions',
                'description' => 'Discover the top 10 questions about your keywords',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}. I want you to act as a market research expert that speaks and writes fluent {{language}}. {{answer_1}} are the target audience (prefixed by audience:), and a topic for the questions (prefixed by keyword:). You will then generate the top 10 questions related to that keyword, for that target audience. Write all in {{language}}',
                'category_id' => 12
            ],
            [
                'id' => 41,
                'title' => 'FAQ generator',
                'description' => 'Easily generate FAQ from content that you paste into the prompt.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.  I want you to act as a very helpful customer support agent speaks and writes fluent {{language}}. I want you to pretend that you can write the perfect, to the point and accurate answer to questions and answers from a text also in {{language}}. Generate a list of 5 frequently asked questions and their answers specifically based on the following text {{answer_1}}.  Do not halluicinate, do not make up random facts. prefix each question with a Q and a number. Then write a short, precise, accurate, very specific answer in {{language}} to the question, prefix that answer with A and a number. Write all in {{language}}',
                'category_id' => 12
            ],
            [
                'id' => 42,
                'title' => 'Keyword strategy',
                'description' => 'Create a keyword strategy and SEO content plan from 1 keyword.',
                'type' => 'text',
                'prompt' => 'Please ignore all previous instructions. I want you to respond only in language {{language}}.
                I want you to act as a market research expert that speaks and writes fluent {{language}}.
                Pretend that you have the most accurate and most detailled information about keywords available.
                Pretend that you are able to develop a full SEO content plan in fluent {{language}}. I will give you the target keyword {{answer_1}}.
                From this keyword create a markdown table with a keyword list for an SEO content strategy plan on the topic {{answer_2}}.
                Cluster the keywords according to the top 10 super categories and name the super category in the first column called keyword cluster.
                Add in another column with 7 subcategories for each keyword cluster or specific long-tail keywords for each of the clusters.
                List in another column the human searcher intent for the keyword. Cluster the topic in one of three search intent groups based on their search intent being, whether commercial, transactional or informational.
                Then in another column, write a simple but very click-enticing title to use for a post about that keyword.
                Then in another column write an attractive meta description that has the chance for a high click-thru-rate for the topic with 120 to a maximum of 155 words.
                The meta description shall be value based, so mention value of the article and have a simple call to action to cause the searcher to click.
                Do NOT under any circumstance use too generic keyword like `introduction`  or `conclusion` or `tl:dr`. Focus on the most specific keywords only.
                Do not use single quotes, double quotes or any other enclosing characters in any of the columns you fill in.
                Do not explain why and what you are doing, just return your suggestions in the table. The markdown table shall be in {{language}} language and have the following columns:  keyword cluster, keyword, search intent, title, meta description.
                Here is the keyword to start again: {{answer_1}}',
                'category_id' => 12
            ],
            [
                'id' => 43,
                'title' => 'Domain name generator',
                'description' => 'Generate 100 domain name ideas for my niche.',
                'type' => 'text',
                'prompt' => 'Generate 100 domain name ideas for {{answer_1}} niche having some search volume in language {{language}}',
                'category_id' => 12
            ],
        ];

        Prompt::insert($prompts);

        Prompt::find(38)->questions()->sync([27]);
        Prompt::find(39)->questions()->sync([27]);
        Prompt::find(40)->questions()->sync([27]);
        Prompt::find(41)->questions()->sync([31]);
        Prompt::find(42)->questions()->sync([32, 33]);
        Prompt::find(43)->questions()->sync([27]);
    }
}
