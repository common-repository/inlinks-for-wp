=== Inlinks for WP ===
Contributors: dixonjones,tushargohel
Donate link: https://inlinks.net/
Tags: internal links, schema, faq schema, content schema, inlinks, content optimization
Requires at least: 4.7
Tested up to: 5.8
Stable tag: 1.6
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Inlinks automates Internal Links and generates content schema and faq schema for 20 pages on your website. 

== Description ==

TLDR: Creates Internal Links & Content Schema. Helps optimize content.

Got time to read? OK:

Inlinks is an award winning technology that can read content and analyze the underlying entities or topics in the content to create Knowledge Graphs.
 
It builds these knowledge graphs of content on its main servers and uses this to help identify the most important topics on a page. With direction from you, pages are set with target topics. These are usually from a list but could be any Wikipedia article if needed. Armed with this "human in the loop", the Inlinks AI is able to:

1. Generate Internal Links to the target topic/page from the other pages on the site. Becuase the AI is based around entities and not keywords, the NLP algorithm spots synonyms and makes informed judgements as to the anchor text to use it its links. All links can be viewed and modified on the inlinks.net servers. 

2. Generate "About" Schemas for each page where a primary topic is set. Now need to worry about syntax as Inlinks does it all. About schema is unique to each page and gives modern search engines clear indications as to the primary content meaning. Each scheam line directs the search engine to the underlying Wikipedia URL for the topic (or other URL if overridden by the user)

3. Generate "Mentions" schemas. These are topics/entities that are prominent on the page but not the primary purpose for the content.

4. Generate FAQ Schemas. Where more than one question is seen in an H tag on the page, followed by paragraphs of text, these are seen as FAQ pages (or sections) and the schema is automatically generated. ***PLEASE NOTE*** It is not ideal to generate more than one form of FAQ Schema on a page. Please either delete the FAQ Schema created by this plugin or disable the FAQ Schema generation from other plugins for best practice. 

== Frequently Asked Questions ==

= Do I need an Inlinks.net account?

Yes - a free account on Inlinks will let you use the plugin's full functionality for 20 pages.

= What happens if I remove the plugin? =

The schemas and internal links will immediately be removed.

= Can I disable part of the functionality? =
You can disable the Internal linking via the Inlinks account. You can disable all schema via the inlinks account. You can also disable everything via the plugin settings (which is useful in staging or if the changes require approval withingthe organization before going live)

== Screenshots ==

1. General settings

== Changelog ==

= 1.6 - August 26, 2021 =

- Removed PHP servside rendering to maintain performance. Users who already implemented PHP mode will be reverted to .js mode

= 1.5.1 - August 13, 2021 =

- Minor update to fix schema syntax in PHP mode.

= 1.5 - August 11, 2021 =

- NEW - Added the ability to render the schema and the links server side via PHP as an option.

= 1.0 =
* This is the first version of the Inlinks Plugin

== Upgrade Notice ==
none

== The Inlinks Plugin does the following: ==

Ordered list:

1. Injects About Schemas and Mentions Schemas through JSON-LD for up to 20 cornerstone pages
2: Injects FAQ Schemas when more than one question is seen in H tags followed by paragraphs
3: Automatically generates internal links based on topic associations (entities) in your top 20 pages.

Here is a link to the help page: (https://inlinks.net/p/plugin)

The tool is built and maintained by Inlinks Optimization LTD, based in the UK, probably with a little help from the community.