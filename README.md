# awf-cpt-proto

AWebFactory plugin to prototype support for custom post types in WordPress.

## How are we going to handle CPT's, including their custom post type item creation and meta data entry?

[Tweet thread announcing repo](https://twitter.com/a_web_factory/status/1641756356989288448), content will be moved to demo site when there's something to demo

AWebFactory
@a_web_factory

Starting a 10-day journey to create a custom AWebFactory plugin to prototype support for custom post types in WordPress. How are we going to handle CPT's, including their custom post type item creation and meta data (fields) entry?
7:56 AM · Mar 31, 2023

·

@a_web_factory
Working on public repo https://github.com/awebfactory/awf-cpt-proto
we are in a bit of a pickle: To start with, what can we use to interactively create the cpt and the custom fields? What will use default architecture? What will still be around in a few years?

·

If we use ACF (especially 6.2 which allows for creation of cpt also) then will the cpt and the custom fields be serialized in the database in default WordPress form? Or will we be dependent (ugh! no!) on ACF PRO? Decision: will not do that.

·

If we use Atlas Content Modeler, 1) same question, and 2) what if @wpebuilders discontinue it (hasn't been touched really for 60 days except for minor updates)? There must be commercial concerns, otherwise why would they abandon such excellent tooling?

·

What about Pods? I have same concerns all along the way as with ACM, plus all public documentation is now non-existent.

I would be happy to write some, or even be a "friend of Pods" and pay up some; but I don't see palpable collective spirit, only catering to builders.

·

Still don't understand why WordPress doesn't care about content modeling when it should easily be one of the "phases", leaving CMS to the "PRO" plugins, each using a different api and db architecture.

·

Sooooo, let's get this prototype on the road with code-based cpt registration, without interactive creation at first. Just to get started. Please follow along every other day or so in my repo to see how I'm doing, and maybe help with suggestions. https://github.com/awebfactory/awf-cpt-proto

> Until progress is made to warrant a demo, see [atomic commits](https://github.com/awebfactory/awf-cpt-proto/commits/main) to `main` in order to follow the steps I'm taking
>
> Also [Discussions](https://github.com/awebfactory/awf-cpt-proto/discussions) are open!

## Multi-dyanamic example

- Experiment to scaffold a simple plugin `Multi-dynamic example` with multiple dynamic blocks (`multi-dynamic-example`) which supports multiple (dynamic) blocks
- Based on [WordPress functions reference docs for register_block_type(), comment: How to write a plugin with multiple blocks](https://developer.wordpress.org/reference/functions/register_block_type/#comment-5954) which seems to me to be the most simple and straightforward, allowing for individual directories for each block in the `build` directory.
- See [commit 2023-04-06 chore(plugin multi-dynamic-example): Experimental plugin to explore how to build a single plugin that supports multiple dynamic blocks](https://github.com/awebfactory/awf-cpt-proto/commit/b40e9d1f33e3916957b800960150e7f1300eff2b)

## References and shout outs (in chronological order of usage for this project)

- [Learn WordPress Courses](https://learn.wordpress.org/courses/)
  - [Introduction to Block Development: Build your first custom block](https://learn.wordpress.org/courses/)
  - [Using the WordPress Data Layer](https://learn.wordpress.org/courses/)
- Carlo Daniele, [Kinsta 2023-01-27 How To Add Meta Boxes and Custom Fields To Posts in Gutenberg](https://kinsta.com/blog/wordpress-add-meta-box-to-post/), January 27, 2023
- Ryan Welcher, [Creating a custom block that stores post meta](https://developer.wordpress.org/news/2023/03/creating-a-custom-block-that-stores-post-meta/), [WordPress Developer Blog](https://developer.wordpress.org/news/), March 3, 2023
